<?php

use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas de la app para el administrador
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//rutas de la app para el usuario
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');

Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');

Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');

Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');

Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');

Route::get('/admin/usuarios/{id}/delete', [App\Http\Controllers\UsuarioController::class, 'view_destroy'])->name('admin.usuarios.view_destroy')->middleware('auth');

Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'delete'])->name('admin.usuarios.destroy')->middleware('auth');


//secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth');

Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth');

Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth');

Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth');

Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth');

Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth');

Route::get('/admin/secretarias/{id}/delete', [App\Http\Controllers\SecretariaController::class, 'viewdelete'])->name('admin.secretarias.delete')->middleware('auth');

Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth');

//pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth');

Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth');

Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth');

Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth');

Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth');

Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth');

Route::get('/admin/pacientes/{id}/delete', [App\Http\Controllers\PacienteController::class, 'viewdelete'])->name('admin.pacientes.delete')->middleware('auth');

Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth');


//consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth');

Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth');

Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth');

Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth');

Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth');

Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth');

Route::get('/admin/consultorios/{id}/delete', [App\Http\Controllers\ConsultorioController::class, 'viewdelete'])->name('admin.consultorios.delete')->middleware('auth');

Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth');


//doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth');

Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth');

Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth');

Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth');

Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth');

Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth');

Route::get('/admin/doctores/{id}/delete', [App\Http\Controllers\DoctorController::class, 'viewdelete'])->name('admin.doctores.delete')->middleware('auth');

Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth');


//horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth');

Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth');

Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth');

Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth');

Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth');

Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth');

Route::get('/admin/horarios/{id}/delete', [App\Http\Controllers\HorarioController::class, 'viewdelete'])->name('admin.horarios.delete')->middleware('auth');

Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth');

//AJAX
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'recuerar_consultorios'])->name('admin.horarios.recuerar_consultorios')->middleware('auth');