<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1= Role::create(['name'=>'administrador']);
       $role2= Role::create(['name'=>'empleado']);

       Permission::create(['name'=>'lineas.index'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'lineas.create'])->syncRoles([$role1]);
       Permission::create(['name'=>'lineas.store'])->syncRoles([$role1]);
       Permission::create(['name'=>'lineas.edit'])->syncRoles([$role1]);
       Permission::create(['name'=>'lineas.update'])->syncRoles([$role1]);

       Permission::create(['name'=>'usuarios.index'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'usuarios.create'])->syncRoles([$role1]);
       Permission::create(['name'=>'usuarios.store'])->syncRoles([$role1]);
       Permission::create(['name'=>'usuarios.edit'])->syncRoles([$role1]);
       Permission::create(['name'=>'usuarios.update'])->syncRoles([$role1]);
       Permission::create(['name'=>'usuarios.crear'])->syncRoles([$role1]);
       Permission::create(['name'=>'usuarios.guardar'])->syncRoles([$role1]);

    }
}
