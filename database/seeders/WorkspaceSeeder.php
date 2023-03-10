<?php

namespace Database\Seeders;

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
            'name' => 'Escola Adenor Abelo'
        ]);
        Workspace::create([
            'name' => 'Escola Educar'
        ]);
    }
}
