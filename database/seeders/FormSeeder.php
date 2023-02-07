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
        Form::create([
            'workspace_id' => 1,
            'user_id' => 1,
            'name' => 'Plano de estudo 3° B',
            'type' => 'processing',
            'status' => 'Processando',
            'date' => date('M d, Y')
        ]);
        Form::create([
            'workspace_id' => 1,
            'user_id' => 1,
            'name' => 'Plano de estudo 2° B',
            'type' => 'success',
            'status' => 'Aprovado',
            'date' => date('M d, Y')
        ]);
        Form::create([
            'workspace_id' => 1,
            'user_id' => 1,
            'name' => 'Plano de estudo 1° B',
            'type' => 'success',
            'status' => 'Aprovado',
            'date' => date('M d, Y')
        ]);
        Form::create([
            'workspace_id' => 2,
            'user_id' => 2,
            'name' => 'Plano de estudo 3° A',
            'type' => 'failed',
            'status' => 'Recusado',
            'date' => date('M d, Y')
        ]);
    }
}
