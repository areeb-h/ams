<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $models = ['student', 'course', 'teacher', 'user', 'exam'];
        $actions = ['view', 'create', 'edit', 'delete'];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissionName = "{$action} {$model}";
                Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleTeacher = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);

        if ($roleAdmin->permissions->count() == 0) {
            $roleAdmin->givePermissionTo(Permission::all());
        }

        $teacherPermissions = [
            'view student', 'view course',
        ];

        $roleTeacher->syncPermissions($teacherPermissions);
    }
}
