<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Negocio']);
        $role3=Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'home','description'=>'Ver el Dashboard'])->syncRoles([$role1,$role2,$role3]);
        
        Permission::create(['name'=>'users.index','description'=>'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.edit','description'=>'Editar usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.update','description'=>'Modificar usuario'])->syncRoles([$role1]);

        Permission::create(['name'=>'roles.index','description'=>'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.create','description'=>'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.edit','description'=>'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.destroy','description'=>'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name'=>'categorias.index','description'=>'Ver listado de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categorias.create','description'=>'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'categorias.edit','description'=>'Editar categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'categorias.destroy','description'=>'Eliminar categorias'])->syncRoles([$role1]);

        Permission::create(['name'=>'clientes.index','description'=>'Ver listado de clientes'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'clientes.create','description'=>'Crear clientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'clientes.edit','description'=>'Editar clientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'clientes.destroy','description'=>'Eliminar clientes'])->syncRoles([$role1]);

        Permission::create(['name'=>'productos.index','description'=>'Ver listado de productos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'productos.create','description'=>'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name'=>'productos.edit','description'=>'Editar productos'])->syncRoles([$role1]);
        Permission::create(['name'=>'productos.destroy','description'=>'Eliminar productos'])->syncRoles([$role1]);

        Permission::create(['name'=>'ventas.index','description'=>'Ver listado de ventas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ventas.create','description'=>'Crear ventas'])->syncRoles([$role1]);
        Permission::create(['name'=>'ventas.edit','description'=>'Editar ventas'])->syncRoles([$role1]);
        Permission::create(['name'=>'ventas.destroy','description'=>'Eliminar ventas'])->syncRoles([$role1]);
    }
}
