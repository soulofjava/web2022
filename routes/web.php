<?php

use App\Helpers\Seo;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemesController;
use App\Http\Controllers\FrontMenuController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\RelatedLinkController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ComRegionController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MigrasiDataController;
use App\Http\Controllers\PinjamTempatController;
use App\Http\Controllers\SSO\SSOController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Website;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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

Route::get('/register', function () {
    return redirect('/login');
});

Route::post('/register', function () {
    return redirect('/login');
});

Route::get('sso', [SSOController::class, 'getLogin'])->name('sso.login');
Route::get('callback', [SSOController::class, 'getCallback'])->name('sso.callback');
Route::get('ssouser', [SSOController::class, 'connectUser'])->name('sso.authuser');

Route::get('/', function () {
    $themes = Website::first();
    Seo::seO();

    try {
        $response = Http::connectTimeout(2)->withoutVerifying()->get('https://diskominfo.wonosobokab.go.id/api/news');
        $response = $response->collect();
        $berita =   array_slice($response['data']['data'], 0, 3);
    } catch (\Exception $e) {
        $berita = [];
    }

    $news = Cache::remember('latest_news', 600, function () {
        return News::with('gambarmuka', 'uploader')->where('terbit', 1)->latest('date')->take(9)->get();
    });

    return view('front.' . $themes->themes_front . '.pages.index', compact('news', 'berita'));
    // return view('front.index', compact('news', 'berita'));
})->name('root')->middleware('data_web', 'VisitorMiddleware');

Route::group(['middleware' => 'data_web'], function () {
    Route::get('newscategory/{id}', [FrontController::class, 'newsByCategory']);
    Route::get('/detail-berita/{id}', [FrontController::class, 'detailberita'])->name('detail-berita');
    Route::get('/news-detail/{slug}', [FrontController::class, 'newsdetail'])->name('news.detail');
    Route::get('news-author/{id}', [FrontController::class, 'newsbyauthor'])->name('news.author');
    Route::get('/news-search', [FrontController::class, 'newsbysearch'])->name('news.search');
    Route::get('newsall', [FrontController::class, 'newsall'])->name('news.all');
    Route::get('/photos', [FrontController::class, 'galleryall'])->name('photo.all');
    Route::post('/setup', [FrontController::class, 'setup'])->name('setup-first');
    Route::get('transparansi/{id}', [FrontController::class, 'transparansi']);
    Route::get('/page/{id}', [FrontController::class, 'page'])->name('page');
    Route::get('/component/{id}', [FrontController::class, 'component'])->name('component');
    Route::get('/load-sql', [FrontController::class, 'loadsql']);
    Route::get('/check', [FrontController::class, 'check']);
    Route::post('kotakmasuk', [FrontController::class, 'inbox']);
    Route::post('guest', [FrontController::class, 'addguest']);
    Route::resource('buku-tamu', GuestBookController::class);
    Route::get('agenda', [FrontController::class, 'event']);
    Route::get('dikecualikan', [FrontController::class, 'dikecualikan'])->name('dikecualikan');
    Route::get('download-area', [FrontController::class, 'downloadarea']);
    Route::get('berita', [FrontController::class, 'newsall']);
    Route::get('layanan', [FrontController::class, 'layanan']);
    Route::get('/reload-captcha', [FrontController::class, 'reloadCaptcha']);
});

Route::middleware(['auth:sanctum', 'verified', 'data_web', 'cek_inbox'])->get('/dashboard', function () {
    $themes = Website::all()->first();
    return view($themes->themes_back . '.pages.dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'data_web', 'cek_inbox'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::resource('themes', ThemesController::class);
    });
    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('settings', WebsiteController::class);
        Route::resource('user', UserController::class);
        Route::resource('frontmenu', FrontMenuController::class);
        Route::resource('relatedlink', RelatedLinkController::class);
        Route::resource('component', ComponentController::class);
        Route::resource('kategori', KategoriController::class);
    });
    Route::resource('news', NewsController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('pinjamtempat', PinjamTempatController::class);
    Route::resource('download', DownloadController::class);
    Route::resource('myprofile', CredentialController::class);
    Route::resource('event', AgendaController::class);
    Route::resource('inbox', InboxController::class);
    Route::post('sendCentang', [ComponentController::class, 'changeAccess'])->name('centang');
    Route::post('sendCentangFM', [FrontMenuController::class, 'changeAccess'])->name('centangfm');
    Route::get('getAlamat', [WebsiteController::class, 'location']);
    Route::resource('file_image', FileController::class);
});

// get data for front menu parent
Route::get('/cari', [FrontMenuController::class, 'loadData'])->name('carimenu');
Route::get('/copydatapostingfromwonosobokab', [FrontController::class, 'copydatapostingfromwonosobokab']);
Route::get('/datappid', [FrontController::class, 'datappid'])->name('datappid');
Route::get('/datappid2', [FrontController::class, 'datappid2'])->name('datappid2');
Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');
Route::get('migrate', [MigrasiDataController::class, 'insert']);

Route::get('kabupaten', [ComRegionController::class, 'kabupaten'])->name('kabupaten');
Route::get('kecamatan', [ComRegionController::class, 'kecamatan'])->name('kecamatan');
Route::get('kelurahan', [ComRegionController::class, 'kelurahan'])->name('kelurahan');

Route::get('template_email', [FrontController::class, 'template_email']);
