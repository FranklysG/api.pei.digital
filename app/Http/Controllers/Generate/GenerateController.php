<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
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
    public function show(Request $request, FormRepository $repository)
    {
        $uuid = $request->uuid;
        if($uuid){
            $data = $repository->getByUuid($uuid);
            $pdf = PDF::loadView('forms', ['data' => $data->toArray()]);
            return $pdf->download('pei-digital-form-' . time() . '.pdf');
        }else {
            return $this->apiResponse->errorResponse('Formulario não encontrado :(', []);
        }
    }
}
