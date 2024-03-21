<?php

namespace App\Http\Controllers;

use App\Helpers\Seo;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Music;
use App\Models\Buaper;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FrontController extends Controller
{
    public function newsdetail($slug)
    {
        $data = News::where('slug', $slug)->first();
        Seo::seO();
        OpenGraph::setDescription(strip_tags(Str::limit($data->description, 50, '...')));
        OpenGraph::setTitle($data->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id');
        // Mendapatkan path gambar dari GCS
        $imagePath = $data->path; // Sesuaikan dengan path gambar di GCS Anda

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
        $data = News::where('slug', $slug)->first();
        views($data)->cooldown(5)->record();
        $news = News::orderBy('date', 'desc')->paginate(5);
        return view('front.pesonafm.pages.newsdetail', compact('data', 'news'));
    }

    public function newsByAuthor($id)
    {
        Seo::seO();
        $hasil = 'All post by : ' . $id;
        $data = News::where('upload_by', '=', $id)->orderBy("date", "desc")->paginate(5);
        $news = News::latest('date')->take(5)->get();
        return view('front.pesonafm.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsBySearch(Request $request)
    {
        Seo::seO();
        $cari = $request->kolomcari;
        $hasil = 'Search result : ' . $cari;
        $data = News::where('title', 'like', '%' . $cari . '%')->orderBy("date", "desc")->paginate(5);
        $news = News::latest('date')->take(5)->get();
        return view('front.pesonafm.pages.newsbyauthor', compact('data', 'news', 'hasil'));
    }

    public function newsall(Request $request)
    {
        Seo::seO();
        $news = News::orderBy('date', 'desc')->paginate(9);
        $sidepost = News::latest('date')->take(5)->get();
        return view('front.pesonafm.pages.news', compact('news', 'sidepost'));
    }

    public function music(Request $request)
    {
        Seo::SeO();
        $music = Music::where('ranking', '<=', 10)->orderBy('ranking', 'ASC')->get();
        return view('front.pesonafm.pages.music', compact('music'));
    }

    public function galleryall(Request $request)
    {
        Seo::SeO();
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(12);
        $sidepost = Gallery::latest('created_at')->take(5)->get();
        return view('front.pesonafm.pages.gallery', compact('gallery', 'sidepost'));
    }

    public function buaper(Request $request)
    {
        Seo::SeO();
        $buaper = Buaper::orderBy('created_at', 'desc')->paginate(9);
        $sidepost = Buaper::latest('created_at')->take(5)->get();
        return view('front.pesonafm.pages.buaper', compact('buaper', 'sidepost'));
    }

    public function struktur(Request $request)
    {
        Seo::seO();
        return view('front.pesonafm.pages.struktur');
    }

    public function jadwal(Request $request)
    {
        Seo::seO();
        return view('front.pesonafm.pages.jadwal');
    }

    public function audio(Request $request)
    {
        return view('front.pesonafm.pages.audio');
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
                'role_id' => '2',
                'email' => $request->email,
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ];
            Website::create($request->except('finish', 'name', 'password', 'password_confirmation'));
            User::create($data);
            return redirect(route('root'));
        }
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
