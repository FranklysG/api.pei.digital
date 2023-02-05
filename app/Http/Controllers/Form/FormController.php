<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Form\StoreRequest;
use App\Http\Requests\Form\UpdateRequest;
use App\Repositories\FormRepository;

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
            return $this->apiResponse->successResponse('Forms created with success', $forms->toArray());
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
            return $this->apiResponse->successResponse('Forms update with success', $forms->toArray());
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
        $forms = $repository->getAll();
        
        if($forms){
            return $this->apiResponse->successResponse('List of Forms', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }
}
