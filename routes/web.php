<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar as rotas web para sua aplicação. Essas rotas
| são carregadas pelo RouteServiceProvider e todas elas serão atribuídas
| ao grupo de middleware "web". Crie algo incrível!
|
*/

/**
 * Redireciona para o dashboard se o usuário estiver autenticado.
 */
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

/**
 * Exibe a página do dashboard. Disponível apenas para usuários autenticados.
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

/**
 * Exibe a página de tabelas. Disponível apenas para usuários autenticados.
 */
Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

/**
 * Exibe a página da carteira. Disponível apenas para usuários autenticados.
 */
Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

/**
 * Exibe a página com suporte a texto da direita para a esquerda (RTL).
 * Disponível apenas para usuários autenticados.
 */
Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

/**
 * Exibe a página de perfil do usuário. Disponível apenas para usuários autenticados.
 */
Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

/**
 * Exibe a página de login. Disponível apenas para convidados (não autenticados).
 */
Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

/**
 * Exibe a página de registro. Disponível apenas para convidados.
 */
Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

/**
 * Exibe o formulário de registro. Disponível apenas para convidados.
 */
Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

/**
 * Processa o formulário de registro. Disponível apenas para convidados.
 */
Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

/**
 * Exibe o formulário de login. Disponível apenas para convidados.
 */
Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

/**
 * Processa o formulário de login. Disponível apenas para convidados.
 */
Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

/**
 * Processa o logout do usuário. Disponível apenas para usuários autenticados.
 */
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/**
 * Exibe o formulário de recuperação de senha. Disponível apenas para convidados.
 */
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

/**
 * Processa o envio de e-mail para recuperação de senha. Disponível apenas para convidados.
 */
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

/**
 * Exibe o formulário de redefinição de senha. Disponível apenas para convidados.
 * O token de redefinição de senha é passado como parâmetro.
 */
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

/**
 * Processa a redefinição de senha. Disponível apenas para convidados.
 */
Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

/**
 * Exibe o perfil do usuário. Disponível apenas para usuários autenticados.
 */
Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])
    ->name('users.profile')
    ->middleware('auth');

/**
 * Processa a atualização do perfil do usuário. Disponível apenas para usuários autenticados.
 */
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

/**
 * Exibe a página de gerenciamento de usuários. Disponível apenas para usuários autenticados.
 */
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])
    ->name('users-management')
    ->middleware('auth');
