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

class FrontController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }

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
        Seo::seO();
        $data = News::with('gambar', 'uploader')->where('slug', $slug)->first();
        views($data)->cooldown(5)->record();
        $news = News::with('gambar')->orderBy('date', 'desc')->paginate(5);
        $file = File::where('id_news', $data->attachment)->get();

        $prev = $data->id - 1;
        $prev_data = News::with('gambar', 'uploader')->where('id', $prev)->first();

        $next = $data->id + 1;
        $next_data = News::with('gambar', 'uploader')->where('id', $next)->first();

        return view('front.' . $this->themes->themes_front . '.pages.newsdetail', compact('data', 'news', 'file', 'prev_data', 'next_data'));
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
        $data = News::with('gambar', 'uploader')->where('upload_by', '=', $id)->orderBy("date", "desc")->paginate(5);
        return view('front.' . $this->themes->themes_front . '.pages.newsbyauthor', compact('data', 'hasil'));
    }

    public function newsBySearch(Request $request)
    {
        Seo::seO();
        $cari = $request->kolomcari;
        $hasil = 'Search result : ' . $cari;
        $data = News::with('gambar')->whereDate('date', 'like', '%' . $cari . '%')->orWhere('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->paginate();
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

        if (!$data) {
            $data = News::where('id', $id)->first();
        }

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

    // kampung pancasila
    public function tentangkami()
    {
        return view('front.kampungpancasila.tentang-kami');
    }

    public function latarbelakang()
    {
        return view('front.kampungpancasila.latar-belakang');
    }

    public function tujuan()
    {
        return view('front.kampungpancasila.tujuan');
    }

    public function kampungpancasila()
    {
        return view('front.kampungpancasila.kampung-pancasila');
    }

    // sql ppid setda
    public function loadsql()
    {
        set_time_limit(0);

        // insert data dari table ppid_post ke tabel news
        $variable = DB::table('ppid_posts')->get();
        foreach ($variable as $us) {
            $isi = str_replace("wp-image", "img-fluid ", $us->post_content);

            $validated =
                [
                    'photo' => 'soulofjava',
                    'path' => 'img/soulofjava.jpg',
                    'date' => $us->post_date,
                    'description' => $isi,
                    'title' => $us->post_title,
                    'upload_by' => 'Admin',
                ];
            News::create($validated);
        }

        // hapus data kolom content yang kosong
        $users = DB::table('news')
            ->where('description', '=', '')
            ->get();
        foreach ($users as $us) {
            News::destroy($us->id);
        }

        // hapus data kolom title yang kosong
        $users = DB::table('news')
            ->where('title', '=', '')
            ->get();
        foreach ($users as $us) {
            News::destroy($us->id);
        }

        // cek duplikasi dan hapus
        $users = News::all();
        $usersUnique = $users->unique('title');
        $usersDupes = $users->diff($usersUnique);
        foreach ($usersDupes as $dp) {
            News::destroy($dp->id);
        }

        // // hitung data
        // $data = News::all()->count();
        // return response()->json($data);

        return response()->json('Selesai');
    }

    public function check()
    {
        // ubah deskripsi yang ada pdf 1
        // $data = News::where('description', 'like', '%[vc_row][vc_column][v_pfbk_flip_book%')->get();
        // $width = '"100%"';
        // $height = '"750"';
        // foreach ($data as $dt) {
        //     $pdfa = str_replace("[vc_row][vc_column][v_pfbk_flip_book", "<embed", $dt->description);
        //     $slice = Str::after($pdfa, '.pdf"');
        //     $pdfb = str_replace($slice, " width=" . $width . " height=" . $height . ">", $pdfa);
        //     News::find($dt->id)->update([
        //         'description' => $pdfb
        //     ]);
        // }

        // ubah deskripsi yang ada pdf 2
        // $data = News::where('description', 'like', '%[pfbk_pdf_flipbook%')->get();
        // $width = '"100%"';
        // $height = '"750"';
        // foreach ($data as $dt) {
        //     $pdfa = str_replace("[pfbk_pdf_flipbook", "<embed", $dt->description);
        //     $slice = Str::after($pdfa, '.pdf"');
        //     $pdfb = str_replace($slice, " width=" . $width . " height=" . $height . ">", $pdfa);
        //     News::find($dt->id)->update([
        //         'description' => $pdfb
        //     ]);
        // }

        // $id = 5602;
        // $data = News::find($id);
        // $slice = Str::after($data->description, 'src="');
        // $slice2 = Str::before($slice, '"');
        // $pdfb = str_replace("][/vc_column][/vc_row]", "width=" . $width . " height=" . $height . ">", $data->description);
        // $data = News::where('description', 'like', '%.pdf%')->get();
        $data = News::all();
        // News::find($b->id)->update([
        // $data = News::where('description', 'like', '%.pdf%')->count();
        foreach ($data as $dt) {
            $slice = Str::after($dt->description, 'src="');
            $slice2 = Str::before($slice, '"');
            echo $slice2;
        }
        // return response()->json('selesai');
        // return $slice2;
    }

    function copydatapostingfromwonosobokab()
    {
        $data = DB::table('posting')->where('domain', '=', 'arpusda.wonosobokab.go.id')->get();
        foreach ($data as $index => $item) {
            print_r($index . "\n");
            $idnya = News::create([
                'title' => $item->judul_posting,
                'description' => $item->isi_posting,
                'date' => $item->created_time,
                'upload_by' =>  'Admin',
            ])->id;
            print_r($idnya);
            $this->copydatafilefromwonosobokab($item->id_posting, $idnya);
        }
    }

    function copydatafilefromwonosobokab($a, $b)
    {
        $isa = [];
        $data = DB::table('attachment')->select('file_name')->where('id_tabel', '=', $a)->get();
        foreach ($data as $ratna) {
            array_push($isa, $ratna->file_name);
            $fff = [
                'id_news' => $b,
                'file_name' => $ratna->file_name,
                'path' => 'gallery/' . $ratna->file_name,
            ];
            DB::table('files')->insert($fff);
        }
        return json_encode($isa);
    }
}
