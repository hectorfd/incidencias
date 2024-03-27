<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
use App\Models\User;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Soporte Técnico',
            'Analista de Redes',
            'Analista de Sistemas',
            'Ensamblador de Muebles'
        ];
        foreach ($specialties as $specialtyName) {
            $specialty = Specialty::create([
                'name' => $specialtyName
            ]);
            $specialty->users()->saveMany(
                 User::factory(4)->state(['role' => 'empleado'])->make()
             );
        }
        User::find(3)->specialties()->save($specialty);
    }
}
