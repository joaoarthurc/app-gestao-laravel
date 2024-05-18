<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'principal'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'principal'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'principal'])->name('site.contato');

Route::get('/login', function () {
    return 'login';
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});

Route::get('teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'principal'])->name('site.teste');

Route::fallback(function () {
    return 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ir para página inicial ';
});


// Route::get(
//     '/contato/{nome}/{categoria_id}',
//     function (
//         string $nome = 'Desconhecido',
//         int $categoria_id = 1,
//     ) {
//         echo "Estamos aqui: $nome - $categoria_id";
//     }
// )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]');
