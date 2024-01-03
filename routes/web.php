<?php

use App\Charts\TotalBerita;
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
use App\Http\Controllers\ComRegionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MigrasiDataController;
use App\Http\Controllers\SSO\SSOController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ZoomController;
use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

// Route::group(
//     ['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']],
//     function () {
//         \UniSharp\LaravelFilemanager\Lfm::routes();
//     }
// );

Route::any('/register', function () {
    return Redirect::to(route('login'));
});

Route::get('sso', [SSOController::class, 'getLogin'])->name('sso.login');
Route::get('callback', [SSOController::class, 'getCallback'])->name('sso.callback');
Route::get('ssouser', [SSOController::class, 'connectUser'])->name('sso.authuser');

Route::get('/', function () {
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

    $news = News::with('gambar', 'gambarmuka', 'uploader')->where('terbit', 1)->orderBy('date', 'desc')->paginate(3);
    return view('front.pages.index', compact('news'));
})->name('root')->middleware('data_web');

Route::group(['middleware' => 'data_web'], function () {
    Route::get('newscategory/{id}', [FrontController::class, 'newsByCategory']);
    Route::get('/detail-berita/{id}', [FrontController::class, 'detailberita'])->name('detail-berita');
    Route::get('/news-detail/{slug}', [FrontController::class, 'newsdetail'])->name('news.detail');
    Route::get('news-author/{id}', [FrontController::class, 'newsbyauthor'])->name('news.author');
    Route::get('/news-search', [FrontController::class, 'newsbysearch'])->name('news.search');
    Route::get('global-search', [FrontController::class, 'globalsearch'])->name('global.search');
    Route::get('transparansi/{id}', [FrontController::class, 'transparansi']);
    Route::get('newsall', [FrontController::class, 'newsall'])->name('news.all');
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
    $tahun = News::whereYear('date', '>=', date("Y") - 5)->select(DB::raw('YEAR(date) as tahun'))
        ->groupBy('tahun')
        ->orderBy('tahun', 'ASC')
        ->pluck('tahun');

    $postsByYear = News::whereYear('date', '>=', date("Y") - 5)->select(DB::raw('YEAR(date) as tahun'), DB::raw('COUNT(*) as total'))
        ->groupBy('tahun')
        ->orderBy('tahun', 'ASC')
        ->pluck('total');

    $colors = $tahun->map(function ($item) {
        return '#' . substr(md5(mt_rand()), 0, 6);
    });

    $chart = new TotalBerita;
    $chart->labels($tahun);
    $chart->dataset('Total Postingan', 'bar', $postsByYear)->backgroundColor($colors);

    return view('back.pages.dashboard', compact('chart'));
})->name('dashboard');

Route::group(['middleware' => ['auth', 'data_web', 'cek_inbox'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::resource('themes', ThemesController::class);
        Route::resource('settings', WebsiteController::class);
        Route::resource('user', UserController::class);
        Route::resource('frontmenu', FrontMenuController::class);
        Route::resource('relatedlink', RelatedLinkController::class);
        Route::resource('component', ComponentController::class);
        Route::resource('testimoni', TestimonialController::class);
    });
    Route::resource('gallery', GalleryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('myprofile', CredentialController::class);
    Route::resource('event', AgendaController::class);
    Route::resource('inbox', InboxController::class);
    Route::post('sendCentang', [ComponentController::class, 'changeAccess'])->name('centang');
    Route::post('sendCentangFM', [FrontMenuController::class, 'changeAccess'])->name('centangfm');
    Route::get('getAlamat', [WebsiteController::class, 'location']);
    Route::resource('file_image', FileController::class);

    // pindah data dari database wonsobokab
    Route::get('insert', [NewsController::class, 'insert']);
});

// get data for front menu parent
Route::get('/cari', [FrontMenuController::class, 'loadData'])->name('carimenu');
Route::get('copydatapostingfromwonosobokab', [FrontController::class, 'copydatapostingfromwonosobokab']);
Route::get('/datappid', [FrontController::class, 'datappid'])->name('datappid');
Route::get('/datappid2', [FrontController::class, 'datappid2'])->name('datappid2');
Route::get('/dikecualikan', [FrontController::class, 'dikecualikan'])->name('dikecualikan');

Route::get('migrate', [MigrasiDataController::class, 'insert']);

Route::get('kabupaten', [ComRegionController::class, 'kabupaten'])->name('kabupaten');
Route::get('kecamatan', [ComRegionController::class, 'kecamatan'])->name('kecamatan');
Route::get('kelurahan', [ComRegionController::class, 'kelurahan'])->name('kelurahan');

Route::get('template_email', [FrontController::class, 'template_email']);
Route::post('komentar', [FrontController::class, 'komentar'])->name('komentar');

Route::get('zoom', [ZoomController::class, 'index']);
Route::any('zoom-meeting-create', [ZoomController::class, 'index']);

Route::get('create-meeting', [ZoomController::class, 'createMeeting']);
Route::get('permohonan-zoom', [ZoomController::class, 'viewzoom']);
