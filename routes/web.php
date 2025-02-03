<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuickDocumentController;

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


// manage the quickdocument
Route::controller(QuickDocumentController::class)
        ->middleware(['auth','verified']) 
        ->group(function(){ 

    Route::match(['get', 'post'],'/quick', 'generatePdf')->name('quickdocument');
    Route::Post('/pdf',  'pdf')->name('pdf');
    Route::get('/social', 'socialTemplate')->name('social');
    Route::get('/video', 'video')->name('video');
    Route::post('/Social/Create', 'createPost')->name('social.create');
    Route::post('/Social/Comment', 'addComment')->name('social.comment');
    Route::post('/Social/Download', 'downloadFiles')->name('social.download');
    Route::get('/Social/View', 'viewFiles')->name('social.view');
});

// Manage User functionality
Route::controller(UsersController::class)
        ->middleware(['auth','verified']) 
        ->group(function(){ 
           


        Route::post('/users-trait', 'users_trait');
        Route::match(['get', 'post'],'/Collaborateurs', 'users')->name('page.users');
        Route::get('/user/search', 'search')->name('page.users.search');
        Route::get('/help', 'help')->name('page.help');
        Route::get('/welcomeFolder', 'welcome')->name('page.welcome');
        Route::get('/welcomeDataSky',  'Firstwelcome')->name('welcome');
        Route::match(['post', 'get'],'/profileuser',  'profile')->name('profile');
        Route::get('/notification', 'Notifications')->name('notifications');
        Route::get('/policy-information',  'policy')->name('policy');
        Route::get('/user-invitation',  'invitation')->name('invite');
        Route::post('/Email-invitation', 'Emailinvitation')->name('inviteByEmail');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/usersProfile', 'usersProfile')->name('all-profile');
        Route::post('/contact-request',  'contactSend')->name('contact-DataSky');
});


// Manage Dashboad
Route::controller(DashboardController::class)
        ->middleware(['auth','verified'])
        ->group(function(){ 
         Route::get('Dashboard/system', 'system')->name('dashboard-system');
         Route::get('Dashboard/users', 'users')->name('dashboard-users');
         Route::get('Dashboard/files', 'files')->name('dashboard-files');        
         Route::post('Dashboard/manage','manage')->name('users.manage');
         Route::post('Dashboard/manage-files',  'manageFiles')->name('file.manage');

});



// Manage files and folders in the system
Route::controller(FileController::class)
        ->middleware(['auth','verified']) 
        ->group(function(){ 

        Route::get('/my-files/{folder?}', 'myFiles')->where('folder', '(.*)')->name('myFiles');
        Route::get('/trash', 'trash')->name('trash');
        Route::post('/folder/create', 'createFolder')->name('folder.create');
        Route::post('/files', 'store')->name('file.store');
        Route::delete('/files', 'destroy')->name('file.delete');
        Route::delete('/files/delete-forever', 'deleteForever')->name('file.deleteForever');
        Route::post('/files/add-to-favourites', 'addToFavourites')->name('file.addToFavourites');
        Route::post('/files/restore', 'restore')->name('file.restore');
        Route::post('/files/share', 'share')->name('file.share');
        Route::get('/shared-with-me', 'sharedWithMe')->name('file.sharedWithMe');
        Route::get('/favourites', 'favourites')->name('file.favourites');
        Route::get('/coWorkers', 'coWorkers')->name('coWorkers');
        Route::get('/shared-by-me', 'sharedByMe')->name('file.sharedByMe');
        Route::get('/files/download', 'download')->name('file.download'); 
        Route::get('/files/download-shared-with-me', 'downloadSharedWithMe')->name('file.downloadSharedWithMe'); 
        Route::get('/files/download-shared-by-me', 'downloadSharedByMe')->name('file.downloadSharedByMe'); 
});


// Manage profiles of users
Route::middleware('auth')->group(function () {
    Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/update-password', [ProfileController::class, 'UpdatePassword'])->name('update.password');
    Route::match(['delete', 'post'],'/profileuser', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::match(['delete', 'post'],'/deleteUser', [ProfileController::class, 'delete'])->name('profile.delete');
});

// dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Welcome files
Route::get('/', function () {
    return view('WelcomeFolder', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

require __DIR__.'/auth.php';