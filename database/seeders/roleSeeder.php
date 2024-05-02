<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'create-prize',
        'edit-prize',
        'delete-prize',
        'create-user',
        'edit-user',
        'delete-user',
    ];

    public function run(): void
    {
        // $user =  Role::create(['name' => 'Administrator']);
        $user = Role::create(['name' => 'Admin']);
        // $permissions = Permission::pluck('id', 'id')->all();
        $user->syncPermissions($this->permissions);

    }
}
