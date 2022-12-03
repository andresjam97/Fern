<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Empresa::create([
            'name' => 'Fern'
        ]);

        $user = User::create([
            'name' => 'Ivan Andres Castro Ruiz',
            'email' => 'admin@gmail.com',
            'empresa_id' => 1,
            'password' => bcrypt('123456'),
            'empresa_id' => 1
        ]);

        $role = Role::create(['name' => 'Admin']);
        $user->assignRole([$role->id]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

    }
}
