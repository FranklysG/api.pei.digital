<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Generate\DownloadRequest;
use App\Repositories\FormRepository;
use PDF;

class GenerateController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function download(DownloadRequest $request, FormRepository $repository)
    {
        $data = $request->validated();
        $uuid = $request->uuid;
        $data = $repository->getByUuid($uuid);
        if($data){
            $pdf = PDF::loadView('forms', ['data' => $data]);
            return $pdf->download('pei-digital-form-' . time() . '.pdf');
        }else {
            return $this->apiResponse->errorResponse('Formulario não encontrado :(', []);
        }
    }
}
