<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $permissions = [
            ['name' => 'Create_Moderator'],
            ['name' => 'Edit_Moderator'],
            ['name' => 'Delete_Moderator'],
            ['name' => 'Moderators'],
            ['name' => 'Product'],
            ['name' => 'Delete_Product'],
            ['name' => 'Competitor'],
            ['name' => 'Create_Competitor'],
            ['name' => 'Edit_Competitor'],
            ['name' => 'Delete_Competitor'],
            ['name' => 'Monitor_Prices'],
            ['name' => 'CronJob'],
            ['name' => 'Find_Competitor_Urls'],
            ['name' => 'Monitor_Price'],
        ];

        // Insert permissions and retrieve the inserted records

        DB::table('permissions')->insert($permissions);
            $allPermissions = DB::table('permissions')->get(); // Retrieve all permissions

        foreach ($allPermissions as $permission) {
            $moderator_permissions[] = [
                'moderator_id' => 1,
                'permission_id' => $permission->id,
            ];
        }

        DB::table('moderator_permissions')->insert($moderator_permissions);
    }

}
