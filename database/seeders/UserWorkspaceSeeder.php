<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Integration;
use App\Models\Plan;
use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserWorkspace::create([
            'user_id' => 1,
            'workspace_id' => 1
        ]);
        UserWorkspace::create([
            'user_id' => 3,
            'workspace_id' => 1
        ]);
        UserWorkspace::create([
            'user_id' => 2,
            'workspace_id' => 2
        ]);
        UserWorkspace::create([
            'user_id' => 4,
            'workspace_id' => 2
        ]);
    }
}
