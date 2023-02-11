<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\FormRepository;
use Illuminate\Http\Request;
use PDF;

class GenerateController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $uuid = $request->uuid;
        // $repository->getByUuid($uuid);
        $data = User::all();
        $pdf = PDF::loadView('forms', ['data' => $data]);
        return $pdf->download('pei-digital-form-' . time() . '.pdf');
    }
}
