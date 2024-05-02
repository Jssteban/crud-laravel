<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\URL;


URL::forceScheme('https');
Route::get('/', [PostsController::class , 'index'])->name('posts.index'); //devuelve la pagina de inicio con todas las declaraciones
Route::get('/posts/create', [PostsController::class , 'create'])->name('posts.create'); //devuelve el formulario para crear una publicacion
Route::post('/posts', [PostsController::class , 'store'])->name('posts.store'); //agrega una publicacion a la base de datos
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show'); //devuelve una pagina que muestra una publicacion completa
Route::get('/posts/{post}/edit', [PostsController::class .'edit'])->name('posts.edit'); // devuelve el formulario para editar una publicación
Route::put('/posts/{post}', [PostsController::class .'update'])->name('posts.update'); // actualiza una publicación
Route::delete('/posts/{post}', [PostsController::class .'destroy'])->name('posts.destroy');// elimina una publicación




