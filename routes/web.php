<?php

use App\Helpers\Seo;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\BuaperController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemesController;
use App\Http\Controllers\FrontMenuController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\RelatedLinkController;
use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Website;
use App\Models\Themes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $themes = Website::all()->first();
    if (Website::all()->count() != 0) {
        $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $data = [
            'ip' => $geoipInfo->ip,
            'iso_code' => $geoipInfo->iso_code,
            'country' => $geoipInfo->country,
            'city' => $geoipInfo->city,
            'state' => $geoipInfo->state,
            'state_name' => $geoipInfo->state_name,
            'postal_code' => $geoipInfo->postal_code,
            'lat' => $geoipInfo->lat,
            'lon' => $geoipInfo->lon,
            'timezone' => $geoipInfo->timezone,
            'continent' => $geoipInfo->continent,
            'currency' => $geoipInfo->currency,
        ];
        Seo::seO();
        Counter::create($data);
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(12);
        $news = News::orderBy('date', 'desc')->paginate(9);
        return view('front.pesonafm.pages.index', compact('gallery', 'news'));
    } else {
        $data = Themes::all();
        return view('front.setup', compact('data'));
    }
})->name('root')->middleware('data_web');


Route::group(['middleware' => 'data_web'], function () {
    Route::get('/strukturall', [FrontController::class, 'struktur'])->name('struktur.all');
    Route::get('/jadwalall', [FrontController::class, 'jadwal'])->name('jadwal.all');
    Route::get('/news-detail/{slug}', [FrontController::class, 'newsdetail'])->name('news.detail');
    Route::get('/news-author/{id}', [FrontController::class, 'newsbyauthor'])->name('news.author');
    Route::get('/news-search', [FrontController::class, 'newsbysearch'])->name('news.search');
    Route::get('/newsall', [FrontController::class, 'newsall'])->name('news.all');
    Route::get('/photos', [FrontController::class, 'galleryall'])->name('photo.all');
    Route::get('/front-music', [FrontController::class, 'music'])->name('music.all');
    Route::get('/front-buaper', [FrontController::class, 'buaper'])->name('buaper.all');
    Route::post('/setup', [FrontController::class, 'setup'])->name('setup-first');
    Route::get('/tentang-kami', [FrontController::class, 'tentangkami'])->name('tentang-kami');
    Route::get('/latar-belakang', [FrontController::class, 'latarbelakang'])->name('latar-belakang');
    Route::get('/tujuan', [FrontController::class, 'tujuan'])->name('tujuan');
    Route::get('/kampung-pancasila', [FrontController::class, 'kampungpancasila'])->name('kampung-pancasila');
    Route::get('/page/{id}', [FrontController::class, 'page'])->name('page');
    Route::get('/component/{id}', [FrontController::class, 'component'])->name('component');
    Route::get('/load-sql', [FrontController::class, 'loadsql']);
    Route::get('/check', [FrontController::class, 'check']);
    Route::post('kotakmasuk', [FrontController::class, 'inbox']);
    Route::post('guest', [FrontController::class, 'addguest']);
    Route::resource('guestbook', GuestBookController::class);
    Route::get('/reload-captcha', [FrontController::class, 'reloadCaptcha']);
});

Route::middleware(['auth:sanctum', 'verified', 'data_web'])->get('/dashboard', function () {
    $themes = Website::all()->first();
    return view('back.a.pages.dashboard');
})->name('dashboard');



Route::group(['middleware' => ['auth', 'data_web']], function () {
    Route::resource('gallery', GalleryController::class);
    Route::resource('buaper', BuaperController::class);
    Route::resource('music', MusicController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('submenu', SubmenuController::class);
    Route::resource('settings', WebsiteController::class);
    Route::resource('news', NewsController::class);
    Route::resource('myprofile', CredentialController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('themes', ThemesController::class);
    Route::resource('frontmenu', FrontMenuController::class);
    Route::resource('relatedlink', RelatedLinkController::class);
    Route::resource('component', ComponentController::class);
    Route::resource('inbox', InboxController::class);
    Route::post('sendCentang', [ComponentController::class, 'changeAccess']);
    Route::get('getAlamat', [WebsiteController::class, 'location']);

    // get data for front menu parent
    Route::get('/cari', [FrontMenuController::class, 'loadData']);
});

Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');
