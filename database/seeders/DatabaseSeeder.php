<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       //Permisos Admin, secretarias, pacientes y médicos
    $admin = Role::create(['name' => 'admin']);
    $secretaria = Role::create(['name' => 'secretaria']);
    //$paciente = Role::create(['name' => 'paciente']);
    $doctor = Role::create(['name' => 'doctor']);
    $staff_de_ventas = Role::create(['name' => 'staff_ventas']);

      User::create([
            'name' => 'Soporte técnico',
            'email' => 'supportweb@gmail.com',
            'password' => Hash::make('cristosalva')
        ])->assignRole('admin');

        User::create([
            'name' => 'Marketing',
            'email' => 'mkt@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('secretaria');

        User::create([
            'name' => 'Doctor 1',
            'email' => 'medico@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        User::create([
            'name' => 'Miguel',
            'email' => 'staffventas@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('staff_ventas');

        User::create([
            'name' => 'paciente julia',
            'email' => 'julia@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        
    //permisos
    Permission::create(['name' => 'admin.index']);

    //permisos en las rutas para el Administrador
    Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.view_destroy'])->syncRoles([$admin]);
    Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

    //permisos en las rutas para Secretari@
    Permission::create(['name' => 'admin.secretarias.index'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.create'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.store'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.show'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.edit'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.update'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.delete'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.secretarias.destroy'])->syncRoles([$admin,$secretaria]);

    //permisos en las rutas para los doctores
    Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.delete'])->syncRoles([$admin,$doctor]);
    Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin,$doctor]);

    //permisos en las rutas para los horarios
    Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.delete'])->syncRoles([$admin,$doctor,$secretaria]);
    Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$admin,$doctor,$secretaria]);
    

    //permisos en las rutas para los consultorios
    Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.update'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.delete'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin,$doctor,$staff_de_ventas]);
    

    //permisos en las rutas para los pacientes
    Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.delete'])->syncRoles([$admin,$secretaria]);
    Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin,$secretaria]);


        //se ejecutara cada Seeder que se llame con el comando php artisan db:seed 
        $this->call([PacienteSeeder::class,]);
    }
}
