<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Moderator;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create basic permissions
        $permissions = [
            'view_dashboard',
            'manage_users',
            'manage_competitors',
            'manage_settings',
            'view_reports',
            'manage_system_performance',
            'manage_moderators'
        ];

        foreach ($permissions as $permission) {
            Permissions::create(['name' => $permission]);
        }

        // Assuming you have a super admin moderator
        $superAdmin = Moderator::where('email', 'admin@example.com')->first();
        if ($superAdmin) {
            // Give all permissions to super admin
            $superAdmin->permissions()->sync(Permissions::all()->pluck('id'));
        }
    }
}
