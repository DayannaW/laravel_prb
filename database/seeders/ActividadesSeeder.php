<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actividades;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actividades::create(['nombreCargo'=>'mercaderista']);
        Actividades::create(['nombreCargo'=>'impulsador']);
        Actividades::create(['nombreCargo'=>'controlador']);
        Actividades::create(['nombreCargo'=>'analista']);


    }
}
