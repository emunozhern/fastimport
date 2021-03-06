<?php

use App\Http\Livewire\Matrix;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\NotMember;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Network;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\UserDetail;
use App\Http\Livewire\Admin\UserPending;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NotMemberController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Livewire\UploadDniForVerification;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Livewire\Admin\Dashboard as  DashboardAdmin;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/foos', function () {
    Artisan::call('storage:link');
});
*/
/*Route::get('/storage/{extra}', function ($extra) {
return redirect("/public/storage/$extra");
})->where('extra', '.*');*/

Route::group([
    'middleware' => ['admin', 'auth:sanctum', 'active'],
    'prefix'=>'admin','as'=>'admin.'
], function () {
    Route::get('dashboard', DashboardAdmin::class)->name('dashboard');
    Route::get('network', Network::class)->name('network');
    Route::get('network/{user_detail}', Network::class)->name('network_user_detail');
    Route::get('users', Users::class)->name('users');
    Route::get('users-pendientes', UserPending::class)->name('users-pending');
});

Route::group([
    'middleware' => ['auth:sanctum', 'active'],
], function () {
    Route::get('/solo-falta-un-paso', UploadDniForVerification::class)->name('upload_dni_for_verification');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/matriz', Matrix::class)->name('matrix');
    Route::get('/matrix_get_user', [MemberController::class, 'matrix_get_user'])->name('matrix_get_user');
});

Route::get('/no-eres-miembro', NotMember::class)->name('not_member');
Route::get('/', CustomLoginController::class) ->middleware(['guest'])->name('index');
Route::get('/{parent_id}', CustomRegisterController::class)
            ->middleware(['guest']);