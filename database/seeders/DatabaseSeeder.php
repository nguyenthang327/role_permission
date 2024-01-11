<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::beginTransaction();
        try {

            $admin = Role::create([
                'name' => 'Tao là admin',
                'code' => 'admin',
            ]);

            $manager = Role::create([
                'name' => 'Tao là quản lý',
                'code' => 'manager',
            ]);

            $user = Role::create([
                'name' => 'Nhân viên quèn',
                'code' => 'user',
            ]);

            $controll = Role::create([
                'name' => 'Kiểm soát',
                'code' => 'controll',
            ]);

            Permission::insert([
                // department
                [
                    'name' => 'department',
                    'code' => 'department.index',
                ],
                [
                    'name' => 'create',
                    'code' => 'department.create',
                ],
                [
                    'name' => 'edit',
                    'code' => 'department.edit',
                ],
                [
                    'name' => 'detail',
                    'code' => 'department.detail',
                ],
                // user
                [
                    'name' => 'user',
                    'code' => 'user.index',
                ],
                [
                    'name' => 'create',
                    'code' => 'user.create',
                ],
                [
                    'name' => 'edit',
                    'code' => 'user.edit',
                ],
                // product
                [
                    'name' => 'product',
                    'code' => 'product.index',
                ],
                [
                    'name' => 'create',
                    'code' => 'product.create',
                ],
                [
                    'name' => 'Detail base',
                    'code' => 'product.detail_base',
                ],
                [
                    'name' => 'Detail',
                    'code' => 'product.detail',
                ],
                [
                    'name' => 'edit base',
                    'code' => 'product.edit_base',
                ],
                [
                    'name' => 'edit detail',
                    'code' => 'product.edit_detail',
                ],
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('dbseed error');
        }
    }
}
