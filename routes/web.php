<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// --- ЛИЧНЫЙ КАБИНЕТ И ЗАЯВКИ (только для авторизованных) ---
Route::middleware('auth')->group(function () {

    // Главная страница после входа (личный кабинет)
    Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.index');
    }
    return app(RepairRequestController::class)->index();
    })->name('dashboard');
    
    // Создание заявки
    Route::get('/requests/create', [RepairRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [RepairRequestController::class, 'store'])->name('requests.store');

    // Список своих заявок (можно использовать отдельно от dashboard, если нужно)
    Route::get('/requests', [RepairRequestController::class, 'index'])->name('requests.index');

    // Стандартные маршруты профиля
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- ПАНЕЛЬ АДМИНИСТРАТОРА (только для админа) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Главная страница админки со всеми заявками
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    // Изменение статуса заявки
    Route::patch('/requests/{repairRequest}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.requests.status');
});

require __DIR__.'/auth.php';
