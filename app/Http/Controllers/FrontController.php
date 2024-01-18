<?php

namespace App\Http\Controllers;

use App\Helpers\Seo;
use App\Models\Agenda;
use App\Models\File;
use App\Models\Component;
use App\Models\DownloadArea;
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
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }

    public function newsdetail($slug)
    {
        Seo::seO();
        $data = News::with('gambar')->where('slug', $slug)->first();
        views($data)->cooldown(5)->record();
        $news = News::with('gambar')->orderBy('date', 'desc')->paginate(5);
        $file = File::where('id_news', $data->attachment)->get();
        return view('front.' . $this->themes->themes_front . '.pages.newsdetail', compact('data', 'news', 'file'));
    }

    public function detailberita($id)
    {
        Seo::seO();
        $response = Http::withoutVerifying()->get('https://diskominfo.wonosobokab.go.id/api/news/' . $id);
        $response = $response->collect();
        $berita =   $response['data'];
        $news = News::orderBy('date', 'desc')->paginate(5);
        return view('front.' . $this->themes->themes_front . '.pages.beritadetail', compact('berita', 'news'));
    }

    public function newsByAuthor($id)
    {
        Seo::seO();
        $usere = User::find($id);
        $hasil = 'All post by : ' . $usere->name;
        $data = News::with('gambar')->where('upload_by', '=', $id)->orderBy("date", "desc")->paginate(5);
        $news = News::latest('date')->take(5)->get();
        return view('front.' . $this->themes->themes_front . '.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsBySearch(Request $request)
    {
        Seo::seO();
        $cari = $request->kolomcari;
        $hasil = 'Search result : ' . $cari;
        $data = News::with('gambar')->where('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->paginate();
        $news = News::latest('date')->take(5)->get();
        return view('front.' . $this->themes->themes_front . '.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsall(Request $request)
    {
        Seo::seO();
        $news = News::latest('date')->paginate(12);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.' . $this->themes->themes_front . '.pages.news', compact('news', 'sideposts'));
    }

    public function newsByCategory($id)
    {
        Seo::seO();
        $news = News::where('kategori', $id)->latest('date')->paginate(12);
        $sideposts = News::latest('date')->take(5)->get();
        return view('front.' . $this->themes->themes_front . '.pages.news', compact('news', 'sideposts'));
    }

    public function galleryall(Request $request)
    {
        Seo::seO();
        $gallery = Gallery::with('gambar')->orderBy('upload_date', 'desc')->paginate(12);
        return view('front.' . $this->themes->themes_front . '.pages.gallery', compact('gallery'));
    }

    public function page($id)
    {
        Seo::seO();
        $data = FrontMenu::where('menu_url', $id)->with('menu_induk')->first();
        return view('front.' . $this->themes->themes_front . '.pages.page', compact('data'));
    }

    public function component($id)
    {
        Seo::seO();
        $data = Component::all();
        return view('front.' . $this->themes->themes_front . '.component.guestbook', compact('data'));
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
        return view('front.' . $this->themes->themes_front . '.component.event');
    }

    public function downloadarea(Request $request)
    {
        Seo::seO();
        if ($request->ajax()) {
            $data = DownloadArea::with('usernya', 'files')->orderBy('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->created_at)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'filesnya',
                    function ($data) {
                        $nama = "";

                        foreach ($data->files as $value) {
                        $download = route('helper.show-picture', array('path' => $value->file_path));
                            $nama .= '<li>
                                             <a  class="dropdown-item" target="_blank" href="' . $download . '">' . $value->file_name . '</a>
                                        </li>
                                             <li class="divider"></li>';
                        }

                        return '<div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Download File
                        </button>
                        <ul class="dropdown-menu">
                        ' . $nama . '
                        </ul>
                      </div>';
                    }
                )
                ->rawColumns(['tgl', 'filesnya'])
                ->make(true);
        }
        return view('front.' . $this->themes->themes_front . '.component.download-area');
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
            Inbox::create($request->except('_token', 'captcha'));
            Alert::success('Success', 'Your Message Has Been Sent');
            return redirect(url('/'));
        }
    }
}
