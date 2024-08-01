<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

      User::create([
            'name' => 'Soporte técnico',
            'email' => 'supportweb@gmail.com',
            'password' => Hash::make('cristosalva')
        ]);

        User::create([
            'name' => 'Marketing',
            'email' => 'mkt@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Doctor 1',
            'email' => 'medico@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'paciente julia',
            'email' => 'julia@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        

        //se ejecutara cada Seeder que se llame con el comando php artisan db:seed 
        $this->call([PacienteSeeder::class,]);
    }
}
