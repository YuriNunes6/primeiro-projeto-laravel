<?php
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//Tarefas
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

//Alunos
Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');