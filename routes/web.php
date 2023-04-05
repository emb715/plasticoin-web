<?php

use App\Http\Controllers\Site\BenefitController;
use App\Http\Controllers\Site\CollectionCenterController;
use App\Http\Controllers\Site\CompanyController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Site\TransferController;
use App\Http\Controllers\Site\VoucherController;
use Illuminate\Support\Facades\Route;

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

Route::name('site.')->group(function () {
    Route::get('', [PagesController::class, 'index'])
        ->name('index');

    Route::get('nosotros', [PagesController::class, 'us'])
        ->name('us');

    Route::get('como-ayudar-a-reciclar', [CollectionCenterController::class, 'index'])
        ->name('collection-center.index');

    Route::get('obtener-beneficios', [BenefitController::class, 'index'])
        ->name('benefit.index');

    Route::name('company.')
        ->prefix('empresas')
        ->controller(CompanyController::class)->group(function () {
            Route::get('empresas', 'index')
                ->name('index');

            Route::post('contacto', 'contact')
                ->name('contact');

            Route::get('contacto/gracias', 'thankYou')
                ->name('thank-you');
        });

    Route::get('terminos-y-condiciones', [PagesController::class, 'terms'])
        ->name('terms');

    Route::middleware('auth')->group(function () {
        Route::get('obtener-beneficios/{benefit}', [BenefitController::class, 'show'])
            ->name('benefit.show');

        Route::post('vouchers', [VoucherController::class, 'store'])
            ->name('voucher.store');

        Route::get('vouchers/{voucher}', [VoucherController::class, 'show'])
            ->name('voucher.show');

        Route::name('transfer.')
            ->prefix('enviar-plasticoins')
            ->controller(TransferController::class)
            ->group(function () {
                Route::get('', 'create')
                    ->name('create');

                Route::post('', 'confirmation')
                    ->name('confirm');

                Route::post('confirmacion', 'store')
                    ->name('store');

                Route::get('{transfer}', 'show')
                    ->name('show');
            });
    });
});

// Auth routes
require __DIR__ . '/auth.php';
