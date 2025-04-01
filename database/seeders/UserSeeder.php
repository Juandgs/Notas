<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;  // Asegúrate de importar el modelo User
use Spatie\Permission\Models\Role;  // Importa la clase Role de Spatie
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver estudiantes']);
        Permission::create(['name' => 'crear estudiante']);
        Permission::create(['name' => 'editar estudiante']);
        Permission::create(['name' => 'eliminar estudiante']);
        Permission::create(['name' => 'ver dashboard']);

        Permission::create(['name' => 'ver profesores']);
        Permission::create(['name' => 'crear profesor']);
        Permission::create(['name' => 'editar profesor']);
        Permission::create(['name' => 'eliminar profesor']);

        $adminUser = User::query()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '1234567890',
            'email_verified_at' => now()
        ]);
        $roleAdmin = Role::create(['name' => 'super-admin']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);
    
    }
}
