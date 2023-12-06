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
use App\Models\Gallery;
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
            $dip = News::where('kategori', 'INFORMASI_ST_04')->latest();
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
            $dip = News::whereNull('kategori')->where('dip', true)->orderBy('dip_tahun', 'DESC');
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
                OpenGraph::addImage(url('storage') . '/' . $data->gambarmuka->path);
            }
        }

        views($data)->cooldown(5)->record();
        $news = News::with('gambarmuka')->orderBy('date', 'desc')->paginate(5);
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

    public function transparansi($id)
    {
        Seo::seO();
        $cari = $id;
        $hasil = 'Hasil Pencarian : ' . $cari;
        $data = News::with('gambar')->Where('title', 'like', '%' . $cari . '%')->latest("date")->paginate(10);
        return view('front.pages.newsbyauthor', compact('hasil', 'data'));
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
        // return $combinedData;

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
        $data = News::with('gambar')->whereDate('date', 'like', '%' . $cari . '%')->orWhere('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->paginate();
        $news = News::latest('date')->take(5)->get();
        return view('front.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsall(Request $request)
    {
        Seo::seO();
        $news = News::latest('date')->paginate(12);
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

    function copydatapostingfromwonosobokab()
    {
        ini_set('max_execution_time', 0);
        // $data = DB::table('postings')->where('id_posting', '7367')->get();
        // $data = DB::table('postings')->get();
        $data = News::all();

        foreach ($data as $index => $item) {
            $indra = explode(',', $item->attachment);
            // return $indra;
            // print_r($index . "\n");
            // $idnya = News::create([
            //     'title' => $item->title_posting,
            //     'content' => $item->content_posting,
            //     'slug' => $item->link_posting,
            //     'upload_by' =>  2,
            //     'date' =>  $item->date_created,
            //     'highlight' =>  $item->headline,
            //     'komentar' =>  $item->published,
            //     'terbit' =>  $item->published,
            // ])->id;
            // print_r($item->id);
            foreach ($indra as $in => $it) {
                $this->copydatafilefromwonosobokab($it, $item->id);
            }
        }
        // print_r('Selesai!');
    }

    function copydatafilefromwonosobokab($a, $b)
    {
        $isa = [];
        $data = DB::table('images')->select('file_name')->where('id_images', '=', $a)->get();
        foreach ($data as $ratna) {
            array_push($isa, $ratna->file_name);
            $fff = [
                'id_news' => $b,
                'file_name' => $ratna->file_name,
                'path' => 'https://website.wonosobokab.go.id/upload/img/' . $ratna->file_name,
            ];
            File::create($fff);
        }
        return json_encode($isa);
    }
}
