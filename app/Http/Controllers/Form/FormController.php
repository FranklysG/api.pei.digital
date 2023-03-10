<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Repositories\FormRepository;
use App\Http\Requests\Form\DeleteRequest;
use App\Http\Requests\Form\StoreRequest;
use App\Http\Requests\Form\UpdateRequest;

class FormController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\StoreRequest  $request
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, FormRepository $repository)
    {
        $data = $request->validated();
        $forms = $repository->create($data);
        if($forms){
            return $this->apiResponse->successResponse('Formulario criado :)', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\UpdateRequest  $request
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, FormRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        $forms = $repository->update($uuid, $data);
        if($forms){
            return $this->apiResponse->successResponse('Formulario atualizado :)', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(FormRepository $repository)
    {
        $forms = $repository->getFormByWorkspaceId();
      
        if($forms){
            return $this->apiResponse->successResponse('List of Forms', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Destroy a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\DeleteRequest  $request
     * @param  \App\Repositories\FormRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, FormRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        
        $forms = $repository->delete($uuid);
        if($forms){
            return $this->apiResponse->successResponse('Formulario deletado :)', []);
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }
}
