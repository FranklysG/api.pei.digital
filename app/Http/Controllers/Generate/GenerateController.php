<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
use App\Models\User;
use PDF;

class GenerateController extends Controller
{
    
    /**
     * Generate a pdf a newly created resource in storage.
     */
    public function show()
    {
        $data = User::all();
        $pdf = PDF::loadView('forms', [ 'data' => $data]);
        return $pdf->download('pei-digital-form-'.time().'.pdf');;
    }
}
