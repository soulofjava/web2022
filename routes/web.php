<?php

use App\Helpers\Seo;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemesController;
use App\Http\Controllers\FrontMenuController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\RelatedLinkController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\MigrasiDataController;
use App\Http\Controllers\HelperController;
use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Website;
use App\Models\Themes;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
        // $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        // $data = [
        //     'ip' => $geoipInfo->ip,
        //     'iso_code' => $geoipInfo->iso_code,
        //     'country' => $geoipInfo->country,
        //     'city' => $geoipInfo->city,
        //     'state' => $geoipInfo->state,
        //     'state_name' => $geoipInfo->state_name,
        //     'postal_code' => $geoipInfo->postal_code,
        //     'lat' => $geoipInfo->lat,
        //     'lon' => $geoipInfo->lon,
        //     'timezone' => $geoipInfo->timezone,
        //     'continent' => $geoipInfo->continent,
        //     'currency' => $geoipInfo->currency,
        // ];
        Seo::seO();
        // Counter::create($data);

        $gallery = Gallery::latest('created_at')->paginate(12);
        $news = Cache::remember('beritaku', 60 * 60, function () {
            return News::latest('date')->paginate(9);
        });
        // $news = News::latest('date')->paginate(9);
        return view('front.' . $themes->themes_front . '.pages.index', compact('gallery', 'news'));
    } else {
        $data = Themes::all();
        return view('front.setup', compact('data'));
    }
})->name('root')->middleware('data_web');

Route::group(['middleware' => 'data_web'], function () {
    Route::get('/detail-berita/{id}', [FrontController::class, 'detailberita'])->name('detail-berita');
    Route::get('/news-detail/{slug}', [FrontController::class, 'newsdetail'])->name('news.detail');
    Route::get('/news-author/{id}', [FrontController::class, 'newsbyauthor'])->name('news.author');
    Route::get('/news-search', [FrontController::class, 'newsbysearch'])->name('news.search');
    Route::get('/newsall', [FrontController::class, 'newsall'])->name('news.all');
    Route::get('/photos', [FrontController::class, 'galleryall'])->name('photo.all');
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
    Route::resource('buku-tamu', GuestBookController::class);
    Route::get('agenda', [FrontController::class, 'event']);
    Route::get('berita', [FrontController::class, 'newsall']);
    Route::get('/reload-captcha', [FrontController::class, 'reloadCaptcha']);
});

Route::middleware(['auth:sanctum', 'verified', 'data_web', 'cek_inbox'])->get('/dashboard', function () {
    $themes = Website::all()->first();
    return view($themes->themes_back . '.pages.dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'data_web', 'cek_inbox'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('settings', WebsiteController::class);
        Route::resource('user', UserController::class);
        Route::resource('themes', ThemesController::class);
        Route::resource('frontmenu', FrontMenuController::class);
        Route::resource('relatedlink', RelatedLinkController::class);
        Route::resource('component', ComponentController::class);
        Route::resource('bidang', BidangController::class);
    });
    Route::resource('gallery', GalleryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('myprofile', CredentialController::class);
    Route::resource('event', AgendaController::class);
    Route::resource('inbox', InboxController::class);
    Route::resource('daily', DailyReportController::class);
    Route::resource('complaint', ComplaintController::class);
    Route::post('sendCentang', [ComponentController::class, 'changeAccess'])->name('centang');
    Route::get('getAlamat', [WebsiteController::class, 'location']);
    Route::post('frameworks', [ComplaintController::class, 'getFrameworks'])->name('frameworks');
    Route::post('upstate/{id}', [ComplaintController::class, 'finish']);
    Route::get('phpword/{id}', [ComplaintController::class, 'phpword']);

    // pindah data dari database wonsobokab
    Route::get('insert', [NewsController::class, 'insert']);

    // Route::get('/menu/checkSlug', [FrontMenuController::class, 'checkSlug']);

});

Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');

// get data for front menu parent
Route::get('/cari', [FrontMenuController::class, 'loadData'])->name('carimenu');

Route::get('migrate', [MigrasiDataController::class, 'insert']);
