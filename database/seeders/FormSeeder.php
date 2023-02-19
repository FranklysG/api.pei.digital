<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Form::factory()->create([
            'workspace_id' => 1,
            'user_id' => 1,
            'type' => 'processing',
            'status' => 'Processando',
            'date' => date('M d, Y')
        ]);
        Form::factory()->create([
            'workspace_id' => 1,
            'user_id' => 1,
            'type' => 'success',
            'status' => 'Aprovado',
            'date' => date('M d, Y')
        ]);
        Form::factory()->create([
            'workspace_id' => 1,
            'user_id' => 1,
            'type' => 'success',
            'status' => 'Aprovado',
            'date' => date('M d, Y')
        ]);
        Form::factory()->create([
            'workspace_id' => 2,
            'user_id' => 2,
            'type' => 'failed',
            'status' => 'Recusado',
            'date' => date('M d, Y')
        ]);
    }
}
