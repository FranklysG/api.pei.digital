<?php

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\Integration;
use App\Models\Plan;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Workspace::create([
            'name' => 'Pei Digital'
        ]);
        Workspace::create([
            'name' => 'Escola Educar'
        ]);
    }
}
