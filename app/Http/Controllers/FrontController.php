<?php

namespace App\Http\Controllers;

use App\Helpers\Seo;
use App\Jobs\KirimEmailInbox;
use App\Models\Agenda;
use App\Models\File;
use App\Models\Component;
use App\Models\FrontMenu;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\GuestBook;
use App\Models\Inbox;
use App\Models\User;
use App\Models\Website;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function datappid()
    {
        $data1 = FrontMenu::whereNotNull('kategori')->get();
        $data2 = DB::table('news')->select('id', 'slug', 'kategori', DB::raw('title as menu_name'))->whereNotNull('kategori')->get();
        $combinedData = $data1->concat($data2);
        // return $combinedData;
        return DataTables::of($combinedData)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($combinedData) {
                    if ($combinedData->slug) {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->menu_url ?? $combinedData->slug) . '" class="btn btn-primary">LIHAT
                                    DATA</a>
                            </td>';
                    } else {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('page', $combinedData->menu_url ?? $combinedData->slug) . '" class="btn btn-primary">LIHAT
                                    DATA</a>
                            </td>';
                    }
                    return $actionBtn;
                }
            )
            ->rawColumns(['action'])
            ->make(true);
        // }
    }

    public function datappid2(Request $request)
    {
        if ($request->ajax()) {
            $dip = News::where('dip', true)->orderBy('dip_tahun', 'DESC')->get();
            return DataTables::of($dip)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($dip) {
                        $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('page', $dip->id) . '" class="btn btn-primary">LIHAT
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
        $data = News::with('gambarmuka')->where('slug', $slug)->first();

        Seo::seO();

        OpenGraph::setDescription(strip_tags(Str::limit($data->content, 50, '...')));
        OpenGraph::setTitle($data->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id');
        OpenGraph::addImage(route('helper.show-picture', ['path' => $data->gambarmuka->path ?? '']), ['height' => 300, 'width' => 300]);

        $data = News::with('gambar', 'uploader')->where('slug', $slug)->first();
        views($data)->cooldown(5)->record();

        $news = News::with('gambarmuka')->where('terbit', 1)->orderByViews()->take(5)->get();

        $file = File::where('id_news', $data->attachment)->get();

        $prev = $data->id - 1;
        $prev_data = News::with('gambar', 'uploader')->where('id', $prev)->first();

        $next = $data->id + 1;
        $next_data = News::with('gambar', 'uploader')->where('id', $next)->first();

        return view('front.pages.newsdetail', compact('data', 'news', 'file', 'prev_data', 'next_data'));
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
        $hasil = 'Search result : ' . $cari;
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
                            <a target="_blank" href="' . url('page', $combinedData->menu_url) . '" class="btn btn-primary">LIHAT
                            DATA</a>
                            </td>';
                        } else {
                            $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->slug) . '" class="btn btn-primary">LIHAT
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
        $hasil = 'Search result : ' . $cari;
        $data = News::with('gambar')->whereDate('date', 'like', '%' . $cari . '%')->orWhere('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->paginate();
        $news = News::latest('date')->take(5)->get();
        return view('front.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsall(Request $request)
    {
        Seo::seO();
        $news = News::latest('date')->paginate(5);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.pages.news', compact('news', 'sideposts'));
    }

    public function transparansi(Request $request, $id)
    {
        Seo::seO();
        $cari = $id;
        $hasil = 'Hasil Pencarian : ' . $cari;
        $data2 = [];

        if ($cari == 'laporan-aset') {
            $data = News::where('title', 'like', 'lap. aset%')->orWhere('title', 'like', 'laporan aset%')->latest("date")->get();
        } elseif ($cari == 'calk') {
            $data = News::where('title', 'like', 'laporan keuangan%')->latest("date")->get();
        } elseif ($cari == 'program-kegiatan') {
            $data = News::where('title', 'like', 'lap. kegiatan%')->latest("date")->get();
        } elseif ($cari == 'lhkpn-pimpinan') {
            $data = News::where('title', 'like', 'lhkpn%')->latest("date")->get();
        } elseif ($cari == 'tupoksi') {
            $data = News::where('title', 'like', 'tugas dan fungsi%')->latest("date")->get();
        } else {
            $data = News::Where('slug', 'like', $cari . '%')->latest("date")->get();
        }

        $combinedData = $data->concat($data2);

        if ($request->ajax()) {
            return DataTables::of($combinedData)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($combinedData) {
                        if ($combinedData->menu_url) {
                            $actionBtn = '<td class="text-center">
                            <a target="_blank" href="' . url('page', $combinedData->menu_url) . '" class="btn btn-primary">LIHAT
                            DATA</a>
                            </td>';
                        } else {
                            $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $combinedData->slug) . '" class="btn btn-primary">LIHAT
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

    public function newsByCategory($id)
    {
        Seo::seO();
        $news = News::where('kategori', $id)->latest('date')->paginate(5);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.pages.news', compact('news', 'sideposts'));
    }

    public function page(Request $request, $id)
    {
        Seo::seO();
        $data = FrontMenu::where('menu_url', $id)->with('menu_induk')->first();
        $news = News::with('gambarmuka')->where('terbit', 1)->orderByViews()->take(5)->get();

        if ($id == 'statistik') {
            $data = News::where('title', 'like', '%' . $id . '%')->with('gambarmuka')->get();
            $hasil = [];

            if ($request->ajax()) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn(
                        'action',
                        function ($data) {
                            $actionBtn = '<td class="text-center">
                                <a target="_blank" href="' . url('news-detail', $data->slug) . '" class="btn btn-primary">LIHAT
                                    DATA</a>
                            </td>';
                            return $actionBtn;
                        }
                    )
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('front.pages.globalsearch', compact('hasil', 'data'));
        }

        if (!$data) {
            $data = News::where('id', $id)->first();
        }

        return view('front.pages.page', compact('data', 'news'));
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
                // 'web_name' => 'required',
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
            // Alert::error('Failed', 'Passwords Do Not Match');
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
