<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesperdicioController;
use App\Http\Controllers\QrCodeExportController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\RefeicaoController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/verificar-email', function (Request $request) {
    return response()->json([
        'existe' => User::where('email', $request->email)->exists(),
    ]);
});
/*
|--------------------------------------------------------------------------
| Rotas protegidas por autenticação
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Turmas
    Route::resource('turmas', TurmaController::class)->except(['show']);
    Route::get('/turmas/{turma}/qrcode', [TurmaController::class, 'qrcode'])->name('turmas.qrcode');
    Route::get('/turmas/{id}/desperdicios', [TurmaController::class, 'showDesperdicios'])->name('turmas.desperdicios');

    // Registrar desperdício por turma
    Route::get('/turmas/{id}/registrar', [DesperdicioController::class, 'create'])->name('turma.registrar');
    Route::post('/turmas/{id}/registrar', [DesperdicioController::class, 'store'])->name('turma.salvar');

    // Desperdícios
    Route::get('/desperdicios/index', [DesperdicioController::class, 'index'])->name('desperdicios.index');
    Route::get('/desperdicios/create/{turma}', [DesperdicioController::class, 'create'])->name('desperdicios.create');
    Route::post('/desperdicios', [DesperdicioController::class, 'store'])->name('desperdicios.store');
    Route::get('/desperdicios/semana', [DesperdicioController::class, 'semana'])->name('desperdicios.semana');
    Route::get('/desperdicios/{desperdicio}/edit', [DesperdicioController::class, 'edit'])->name('desperdicios.edit');

    // Refeições
    Route::resource('refeicoes', RefeicaoController::class);

    // Relatórios
    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    Route::get('/relatorios/exportar', [RelatorioController::class, 'export'])->name('relatorios.export');

    Route::get('/turmas/qrcodes/pdf', [QrCodeExportController::class, 'export'])->name('turmas.qrcodes.pdf');
});

/*
|--------------------------------------------------------------------------
| Rotas de autenticação (Auth scaffolding)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
