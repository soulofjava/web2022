<?php

namespace App\Http\Controllers;

use App\Helpers\Seo;
use App\Jobs\KirimEmailInbox;
use App\Models\Agenda;
use App\Models\Comment;
use App\Models\File;
use App\Models\Component;
use App\Models\DataPPID;
use App\Models\FrontMenu;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\GuestBook;
use App\Models\Inbox;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FrontController extends Controller
{
    public function komentar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'Gagal Menyimpan Komentar');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Comment::create([
                'name' => $request->name,
                'email' => $request->email,
                'comments' => $request->comments,
                'news_id' => $request->id,
            ]);
            Alert::success('Success', 'Komentar Berhasil Disimpan');
            return redirect()->back();
        }
    }

    public function datappid()
    {
        $combinedData = DataPPID::select('*');
        return DataTables::of($combinedData)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($combinedData) {
                    if ($combinedData->tipe == 'news') {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->menu_url) . '" class="btn btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                    } else {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('page', $combinedData->menu_url) . '" class="btn btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                    }
                    return $actionBtn;
                }
            )
            ->rawColumns(['action'])
            ->make(true);
    }

    public function dikecualikan(Request $request)
    {
        if ($request->ajax()) {
            $dip = News::where('kategori', 'INFORMASI_ST_04')->latest('date');
            return DataTables::of($dip)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($dip) {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $dip->slug) . '" class="btn btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function tabel(Request $request, $id)
    {
        if ($request->ajax()) {
            $dip = News::where('title', 'like', '%' . $id . '%')->latest('date');
            return DataTables::of($dip)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($dip) {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $dip->slug) . '" class="btn btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function datappid2(Request $request)
    {
        if ($request->ajax()) {
            $dip = News::whereNotNull('kategori')->where('kategori', '!=', 'INFORMASI_ST_04')->where('dip', 1)->latest('dip_tahun');
            return DataTables::of($dip)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($dip) {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $dip->slug) . '" class="btn btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function newsdetail($slug)
    {
        $data = News::with('gambar', 'uploader', 'gambarmuka')->where('slug', $slug)->first();

        Seo::seO();

        OpenGraph::setDescription(strip_tags(Str::limit($data->content, 50, '...')));
        OpenGraph::setTitle($data->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id');

        if (!empty($data->gambarmuka->path)) {
            if (Str::contains($data->gambarmuka->path, 'https')) {
                OpenGraph::addImage($data->gambarmuka->path);
            } else {
                // Mendapatkan path gambar dari GCS
                $imagePath = $data->gambarmuka->path; // Sesuaikan dengan path gambar di GCS Anda

                // Mendapatkan konten gambar dari GCS
                $imageContent = Storage::get($imagePath);

                // Membuat instance gambar menggunakan Intervention Image
                $image = Image::make($imageContent);

                // Menyesuaikan ukuran gambar tanpa mempertahankan rasio aspek
                $image->fit(300, 300);

                // Mengirim gambar yang sudah dikompres sebagai respons HTTP
                // return response($compressedImage, 200)
                // ->header('Content-Type', 'image/jpeg');

                // Menghasilkan nama file baru berdasarkan format "hari-bulan-tahun"
                $newFileName = $slug . '.jpg';

                // Menyimpan gambar yang sudah dikompres ke GCS
                $temporaryImagePath = 'thumbs/' . $newFileName;
                Storage::disk('gcs')->put($temporaryImagePath, $image->encode());
                OpenGraph::addImage(route('helper.show-picture', ['path' => $temporaryImagePath ?? '']), ['height' => 300, 'width' => 300]);
            }
        } else {
            OpenGraph::addImage(url('assets/pemda.ico'));
        }

        views($data)->cooldown(5)->record();
        $news = News::with('gambarmuka')->latest('date')->paginate(5);
        $file = File::where('id_news', $data->attachment)->get();

        return view('front.pages.newsdetail', compact('data', 'news', 'file'));
    }

    public function detailberita($id)
    {
        Seo::seO();
        $response = Http::withoutVerifying()->get('https://diskominfo.wonosobokab.go.id/api/news/' . $id);
        $response = $response->collect();
        $berita =   $response['data'];
        $news = News::orderBy('date', 'desc')->paginate(5);
        return view('front.pages.beritadetail', compact('berita', 'news'));
    }

    public function transparansi(Request $request, $id)
    {
        Seo::seO();
        $hasil = str_replace('-', ' ', Str::upper($id));

        $data = News::withAnyTag([Str::slug($id)])->where('terbit', 1)->latest("date")->get();
        $data2 = [];

        $combinedData = $data->concat($data2);

        if ($request->ajax()) {
            return DataTables::of($combinedData)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($combinedData) {
                        if ($combinedData->menu_url) {
                            $actionBtn = '<td class="text-center">
                            <a target="_blank" href="' . url('page', $combinedData->menu_url) . '" class="btn btn-sm btn-warning">LIHAT
                            DATA</a>
                            </td>';
                        } else {
                            $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->slug) . '" class="btn btn-sm btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('front.pages.globalsearch', compact('hasil', 'combinedData'));
    }

    public function newsByAuthor($id)
    {
        Seo::seO();
        $hasil = 'All post by : ' . $id;
        $data = News::with('gambar')->where('upload_by', '=', $id)->orderBy("date", "desc")->paginate(5);
        $news = News::latest('date')->take(5)->get();
        return view('front.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function globalSearch(Request $request)
    {
        Seo::seO();
        $cari = $request->kolomcari;
        $hasil = 'Hasil Pencarian : ' . $cari;
        $data = News::with('gambar')->whereDate('date', 'like', '%' . $cari . '%')->orWhere('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->get();
        $data2 = DB::table('front_menus')->select('id', 'menu_url', 'kategori', DB::raw('menu_name as title'))->where('menu_name', 'like', '%' . $cari . '%')->get();
        $combinedData = $data->concat($data2);

        if ($request->ajax()) {
            return DataTables::of($combinedData)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($combinedData) {
                        if ($combinedData->menu_url) {
                            $actionBtn = '<td class="text-center">
                            <a target="_blank" href="' . url('page', $combinedData->menu_url) . '" class="btn btn-sm btn-warning">LIHAT
                            DATA</a>
                            </td>';
                        } else {
                            $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->slug) . '" class="btn btn-sm btn-warning">LIHAT
                                    DATA</a>
                            </td>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('front.pages.globalsearch', compact('hasil', 'combinedData'));
    }

    public function newsBySearch(Request $request)
    {
        Seo::seO();
        $cari = $request->kolomcari;
        $hasil = 'Hasil Pencarian : ' . $cari;
        $data = News::withAnyTag(['berita'])
            ->with('gambarmuka')
            ->where(function ($query) use ($cari) {
                $query->whereDate('date', 'like', '%' . $cari . '%')
                    ->orWhere('title', 'like', '%' . $cari . '%');
            })
            ->latest("date")
            ->paginate();
        $news = [];
        // $news = News::latest('date')->take(5)->get();
        return view('front.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsall(Request $request)
    {
        Seo::seO();
        $news = News::withAnyTag(['berita'])->latest('date')->paginate(12);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.pages.news', compact('news', 'sideposts'));
    }

    public function newsByCategory($id)
    {
        Seo::seO();
        $news = News::where('kategori', $id)->latest('date')->paginate(12);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.pages.news', compact('news', 'sideposts'));
    }

    public function galleryall(Request $request)
    {
        Seo::seO();
        $gallery = Gallery::with('gambar')->orderBy('upload_date', 'desc')->paginate(12);
        return view('front.pages.gallery', compact('gallery'));
    }

    public function page($id)
    {
        Seo::seO();
        $data = FrontMenu::where('menu_url', $id)->with('menu_induk')->first();

        if (!$data) {
            $data = News::where('id', $id)->first();
        }

        return view('front.pages.page', compact('data'));
    }

    public function component($id)
    {
        Seo::seO();
        $data = Component::all();
        return view('front.component.guestbook', compact('data'));
    }

    public function setup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'themes_front' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'themes_front.required' => 'Themes Must Be Chosen',
                'name.required' => 'The Username field is required',
                'email.required' => 'The Email field is required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'email' => $request->email,
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ];
            Website::create($request->except('finish', 'name', 'password', 'password_confirmation'));
            $user = User::create($data);
            $user->syncRoles('admin');
            return redirect(route('root'));
        }
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function addguest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'instansi' => 'required',
            'keperluan' => 'required',
            'jumlah' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::error('Failed', 'Make Sure All Input Is Filled');
            return redirect()->back()->withInput();
        } else {
            GuestBook::create($request->except('_token'));
            Alert::success('Success', 'Your Data Has Been Save');
            return redirect()->back();
        }
    }

    public function event(Request $request)
    {
        Seo::seO();
        if ($request->ajax()) {
            $data = Agenda::orderBy('date', 'asc')->whereDate('date', '>=', now());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->date)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['tgl'])
                ->make(true);
        }
        return view('front.component.event');
    }

    public function inbox(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'You Have Enter The Wrong Captcha');
            return redirect()->back()->withInput();
        } else {
            $data = [
                'email' => $request->email,
                'nama' => $request->name,
            ];
            Inbox::create($request->except('_token', 'captcha'));
            KirimEmailInbox::dispatch($data);
            Alert::success('Success', 'Your Message Has Been Sent');
            return redirect(url('/'));
        }
    }
}
