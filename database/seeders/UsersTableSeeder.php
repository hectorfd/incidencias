<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Hector',
            'lastName'=> 'Ferro Dávalos',
            'email'=>'hector@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'dni'=>'73369445',
            'estado'=>'activo',
            'role'=>'admin',
        ]);
       User::create([
            'name'=> 'Hector',
            'lastName'=> 'Ferro Dávalos',
            'email'=>'ferro@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'dni'=>'73369445',
            'estado'=>'activo',
            'role'=>'empleado',
       ]);
       User::create([
            'name'=> 'usuario',
            'lastName'=> 'apellido',
            'email'=>'usuario@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'dni'=>'73369445',
            'estado'=>'activo',
            'role'=>'cliente',
       ]);

       User::factory()
       ->count(50)
       ->state(['role'=>'cliente'])
       ->create();
    }
}
