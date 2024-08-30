<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComunityController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProductoController;

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
    return view('welcome');
});

Route::get('/contacto/{url}', [SiteController::class, 'contacto'])->name('link.whatsapp');

Route::post('telegram', [TelegramController::class, 'updatesTelegram']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');
    Route::get('/home', [HomeController::class, 'dashboard'])->name('admin.home');



    // redes
    // --------------------------------------------------------------------------------------
    Route::name('redes.')
        ->group(function () {
    
            Route::get('redes/listar', [RedController::class, 'index'])
                ->name('index');
    
            Route::get('redes/crear', [RedController::class, 'create'])
                ->name('create');
    
            Route::post('redes/guardar', [RedController::class, 'store'])
                ->name('store');
    
            Route::get('redes/editar/{red}', [RedController::class, 'edit'])
                ->name('edit');
    
            Route::post('redes/actualizar/{red}', [RedController::class, 'update'])
                ->name('update');
    
            Route::get('redes/eliminar/{red}', [RedController::class, 'destroy'])
                ->name('delete');
    
    });


    Route::prefix('user')->group(function () {
        
        Route::get('/mi-perfil', [UserController::class, 'perfil'])->name('user.perfil');
        Route::post('/informarLesion', [UserController::class, 'informarLesion'])->name('user.informarLesion');

        Route::post('/updatePerfil', [UserController::class, 'updatePerfil'])->name('user.updatePerfil');
        Route::get('/listar', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
        Route::post('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    
    });

    //TODO: PRODUCTOS

    Route::prefix('productos')
        ->group( function () {
            Route::get('/listar', [ProductoController::class, 'index'])->name('producto.index');
            Route::get('/create', [ProductoController::class, 'create'])->name('producto.create');
            Route::post('/store', [ProductoController::class, 'store'])->name('producto.store');
            Route::get('/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
            Route::put('/update/{producto}', [ProductoController::class, 'update'])->name('producto.update');
            Route::delete('/destroy/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
        });

    // NOTIFICACIONES
    // --------------------------------------------------------------------------------------
    Route::name('admin.notificaciones.')
        ->group(function () {

            Route::get('notificaciones', [NotificationsController::class, 'index'])
                ->name('index');

            Route::get('notificaciones/read/{m}', [NotificationsController::class, 'read'])
                ->name('read');

            Route::get('notificaciones/markAsRead/{m}', [NotificationsController::class, 'markAsRead'])
                ->name('markAsRead');

            Route::get('notificaciones/markAsRead/all', [NotificationsController::class, 'markAsRead'])
                ->name('markAsRead.all');

            Route::get('provisorias', [NotificationsController::class, 'provisorias'])
                ->name('provisorias');

            Route::get('notificaciones/eliminar/{id}', [NotificationsController::class, 'delete'])
                ->name('delete');

        });

        Route::name('roles.')
            ->group(function () {

                Route::get('roles', [RoleController::class, 'index'])
                    ->name('index');

                Route::post('roles/store', [RoleController::class, 'store'])
                    ->name('store');

                Route::get('/roles/editar/{role}', [RoleController::class, 'edit'])
                    ->name('edit');

                Route::get('/roles/create', [RoleController::class, 'create'])
                    ->name('create');

                Route::post('/roles/actualizar/{role}', [RoleController::class, 'update'])
                    ->name('update');

                Route::post('/roles/borrar/{role}', [RoleController::class, 'delete'])
                    ->name('delete');
            });



});




Route::get('/soporte', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.soporte');

require __DIR__.'/auth.php';
