<?php

use App\Models\Married;
use App\Mail\SendScheduleEmail;
use App\Models\ArchiveDocument;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Catin\HomeController;
use App\Http\Controllers\Catin\CeraiController;
use App\Http\Controllers\Catin\RujukController;
use App\Http\Controllers\LandingPageController;

use App\Http\Controllers\Catin\ProfileController;
use App\Http\Controllers\Staff\MarriedController;
use App\Http\Controllers\Catin\RegisterController;
use App\Http\Controllers\Staff\DocumentController;
use App\Http\Controllers\Staff\PenghuluController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Catin\NotificationController;
use App\Http\Controllers\Staff\VerificationController;
use App\Http\Controllers\Staff\AssignPenghuluController;
use App\Http\Controllers\Staff\DocumentArchiveController;

use App\Http\Controllers\Catin\DocumentDownloadController;

use App\Http\Controllers\Staff\GenerateAkadNumberController;
use App\Http\Controllers\Kakua\CeraiController as KakuaCeraiController;
use App\Http\Controllers\Kakua\RujukController as KakuaRujukController;
use App\Http\Controllers\Staff\CeraiController as StaffCeraiController;
use App\Http\Controllers\Staff\RujukController as StaffRujukController;
use App\Http\Controllers\Kakua\MarriedController as KakuaMarriedController;
use App\Http\Controllers\Kakua\ProfileController as KakuaProfileController;
use App\Http\Controllers\Staff\ProfileController as StaffProfileController;
use App\Http\Controllers\Kakua\DocumentController as KakuaDocumentController;
use App\Http\Controllers\Kakua\PenghuluController as KakuaPenghuluController;
use App\Http\Controllers\Kakua\DashboardController as KakuaDashboardController;

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

Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Route::get('/send-email', function () {
    $married = Married::first();
    $data = [
        'tanggal' => $married->pramarried_date?->isoFormat('dddd, D MMMM Y'),
        'jam' => $married->pramarried_date?->format('H:i'),
    ];
    Mail::to('joyoom34@gmail.com')->send(new SendScheduleEmail($data));

    dd("Email Berhasil dikirim.");
});

Route::get('/email', function () {
    $married = Married::first();
    $data = [
        'tanggal' => $married->pramarried_date?->isoFormat('dddd, D MMMM Y'),
        'jam' => $married->pramarried_date?->format('H:i'),

    ];
    return view('email_cerai', [
        'type_menu' => 'bootstrap',
        'data' => $data,
        'status' => 'approve'
    ]);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_aksi'])->name('login_aksi');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_aksi'])->name('register_aksi');
});
// Route::redirect('/', '/login');


//ROUTE CATIN
Route::middleware(['web', 'auth', 'checkRole:catin'])->prefix('catin')->name('catin.')->group(function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::controller(RegisterController::class)->group(
        function () {
            Route::get('/pendaftaran', 'index')->name('married.index');
            Route::post('/pendaftaran',  'store')->name('married.store');
            Route::get('/pendaftaran/tambah',  'create')->name('married.create');
            Route::get('/pendaftaran/{married}',  'show')->name('married.show');
            Route::put('/pendaftaran/{married}',  'update')->name('married.update');
            Route::delete('/pendaftaran/{married}',  'destroy')->name('married.destroy');
            Route::get('/pendaftaran/{married}/edit',  'edit')->name('married.edit');
        }
    );

    Route::controller(CeraiController::class)->group(
        function () {
            Route::get('/perceraian', 'index')->name('perceraian.index');
            Route::post('/perceraian', 'store')->name('perceraian.store');
        }
    );

    Route::controller(RujukController::class)->group(
        function () {
            Route::get('/rujuk', 'index')->name('rujuk.index');
            Route::post('/rujuk', 'store')->name('rujuk.store');
        }
    );

    Route::controller(NotificationController::class)->group(
        function () {
            Route::get('/notification', 'index')->name('married.notification');
            Route::get('/notification/read/{notification?}', 'read')->name('married.notification.read');
        }
    );

    Route::get('document', [DocumentDownloadController::class, 'index'])->name('download.document');
    Route::get('document/{type}', [DocumentDownloadController::class, 'download'])->name('download.document.show');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//ROUTE STAGG
Route::middleware(['web', 'auth', 'checkRole:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(MarriedController::class)->group(
        function () {
            Route::get('/pernikahan', 'index')->name('married.index');
            Route::get('/pernikahan/{married}',  'show')->name('married.show');
            Route::get('/jadwal-pernikahan', 'scheduleMarried')->name('schedule');
        }
    );

    Route::controller(StaffCeraiController::class)->group(
        function () {
            Route::get('/perceraian', 'index')->name('perceraian.index');
            Route::get('/perceraian/{cerai}',  'show')->name('perceraian.show');
            Route::put('/perceraian/{cerai}',  'approval')->name('perceraian.approval');
        }
    );

    Route::controller(StaffRujukController::class)->group(
        function () {
            Route::get('/rujuk', 'index')->name('rujuk.index');
            Route::get('/rujuk/{rujuk}',  'show')->name('rujuk.show');
            Route::put('/rujuk/{rujuk}',  'approval')->name('rujuk.approval');
        }
    );

    Route::controller(PenghuluController::class)->group(
        function () {
            Route::get('/penghulu', 'index')->name('penghulu.index');
        }
    );

    Route::controller(DocumentController::class)->group(
        function () {
            Route::get('/document', 'index')->name('document.index');
            Route::post('/document',  'store')->name('document.store');
            Route::get('/document/tambah',  'create')->name('document.create');
            Route::put('/document/{document}',  'update')->name('document.update');
            Route::delete('/document/{document}',  'destroy')->name('document.destroy');
            Route::get('/document/{document}/edit',  'edit')->name('document.edit');
        }
    );

    Route::get('document/rujuk', [DocumentArchiveController::class, 'rujuk'])->name('archive.document.rujuk');
    Route::get('document/perceraian', [DocumentArchiveController::class, 'cerai'])->name('archive.document.cerai');
    Route::put('verification_payment/{married}', VerificationController::class)->name('verification_payment');
    Route::put('generate_number/{married}', GenerateAkadNumberController::class)->name('generate_number');
    Route::post('assign_penghulu/{married}', AssignPenghuluController::class)->name('assign_penghulu');
    Route::get('profile', [StaffProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [StaffProfileController::class, 'update'])->name('profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['web', 'auth', 'checkRole:kakua'])->prefix('kakua')->name('kakua.')->group(function () {
    Route::get('dashboard', [KakuaDashboardController::class, 'index'])->name('dashboard');
    Route::controller(KakuaMarriedController::class)->group(
        function () {
            Route::get('/pernikahan', 'index')->name('married.index');
            Route::get('/pernikahan/{married}',  'show')->name('married.show');
            Route::get('/jadwal-pernikahan', 'scheduleMarried')->name('schedule');
        }
    );

    Route::controller(KakuaCeraiController::class)->group(
        function () {
            Route::get('/perceraian', 'index')->name('perceraian.index');
            Route::get('/perceraian/{cerai}',  'show')->name('perceraian.show');
            Route::put('/perceraian/{cerai}',  'approval')->name('perceraian.approval');
        }
    );

    Route::controller(KakuaRujukController::class)->group(
        function () {
            Route::get('/rujuk', 'index')->name('rujuk.index');
            Route::get('/rujuk/{rujuk}',  'show')->name('rujuk.show');
            Route::put('/rujuk/{rujuk}',  'approval')->name('rujuk.approval');
        }
    );

    Route::controller(KakuaPenghuluController::class)->group(
        function () {
            Route::get('/penghulu', 'index')->name('penghulu.index');
            Route::post('/penghulu',  'store')->name('penghulu.store');
            Route::get('/penghulu/tambah',  'create')->name('penghulu.create');
            Route::get('/penghulu/{penghulu}',  'show')->name('penghulu.show');
            Route::put('/penghulu/{penghulu}',  'update')->name('penghulu.update');
            Route::delete('/penghulu/{penghulu}',  'destroy')->name('penghulu.destroy');
            Route::get('/penghulu/{penghulu}/edit',  'edit')->name('penghulu.edit');
        }
    );

    Route::controller(KakuaDocumentController::class)->group(
        function () {
            Route::get('/document', 'index')->name('document.index');
            Route::post('/document',  'store')->name('document.store');
            Route::get('/document/tambah',  'create')->name('document.create');
            Route::put('/document/{document}',  'update')->name('document.update');
            Route::delete('/document/{document}',  'destroy')->name('document.destroy');
            Route::get('/document/{document}/edit',  'edit')->name('document.edit');
        }
    );

    Route::get('profile', [KakuaProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [KakuaProfileController::class, 'update'])->name('profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});






















// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});


// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});


// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// google maps
// belum tersedia

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});
Route::get('/modules-datatables', function () {
    return view('pages.modules-datatables', ['type_menu' => 'modules']);
});
Route::get('/modules-flag', function () {
    return view('pages.modules-flag', ['type_menu' => 'modules']);
});
Route::get('/modules-font-awesome', function () {
    return view('pages.modules-font-awesome', ['type_menu' => 'modules']);
});
Route::get('/modules-ion-icons', function () {
    return view('pages.modules-ion-icons', ['type_menu' => 'modules']);
});
Route::get('/modules-owl-carousel', function () {
    return view('pages.modules-owl-carousel', ['type_menu' => 'modules']);
});
Route::get('/modules-sparkline', function () {
    return view('pages.modules-sparkline', ['type_menu' => 'modules']);
});
Route::get('/modules-sweet-alert', function () {
    return view('pages.modules-sweet-alert', ['type_menu' => 'modules']);
});
Route::get('/modules-toastr', function () {
    return view('pages.modules-toastr', ['type_menu' => 'modules']);
});
Route::get('/modules-vector-map', function () {
    return view('pages.modules-vector-map', ['type_menu' => 'modules']);
});
Route::get('/modules-weather-icon', function () {
    return view('pages.modules-weather-icon', ['type_menu' => 'modules']);
});

// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});

// error
Route::get('/error-403', function () {
    return view('pages.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.error-503', ['type_menu' => 'error']);
});

// features
Route::get('/features-activities', function () {
    return view('pages.features-activities', ['type_menu' => 'features']);
});
Route::get('/features-post-create', function () {
    return view('pages.features-post-create', ['type_menu' => 'features']);
});
Route::get('/features-post', function () {
    return view('pages.features-post', ['type_menu' => 'features']);
});
Route::get('/features-profile', function () {
    return view('pages.features-profile', ['type_menu' => 'features']);
});
Route::get('/features-settings', function () {
    return view('pages.features-settings', ['type_menu' => 'features']);
});
Route::get('/features-setting-detail', function () {
    return view('pages.features-setting-detail', ['type_menu' => 'features']);
});
Route::get('/features-tickets', function () {
    return view('pages.features-tickets', ['type_menu' => 'features']);
});

// utilities
Route::get('/utilities-contact', function () {
    return view('pages.utilities-contact', ['type_menu' => 'utilities']);
});
Route::get('/utilities-invoice', function () {
    return view('pages.utilities-invoice', ['type_menu' => 'utilities']);
});
Route::get('/utilities-subscribe', function () {
    return view('pages.utilities-subscribe', ['type_menu' => 'utilities']);
});

// credits
Route::get('/credits', function () {
    return view('pages.credits', ['type_menu' => '']);
});
