<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuentas;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuentas::create(['nombreCuenta'=>'Alicorp','empresaResponsable_id'=>1]);
        Cuentas::create(['nombreCuenta'=>'Sony','empresaResponsable_id'=>2]);
        Cuentas::create(['nombreCuenta'=>'Colgate','empresaResponsable_id'=>2]);
        Cuentas::create(['nombreCuenta'=>'Samsung','empresaResponsable_id'=>1]);

    }
}
