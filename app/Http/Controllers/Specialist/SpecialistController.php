<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialist\StoreRequest;
use App\Http\Requests\Specialist\UpdateRequest;
use App\Http\Requests\Specialist\DeleteRequest;
use App\Repositories\SpecialistRepository;

class SpecialistController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Specialist\StoreRequest  $request
     * @param  \App\Repositories\SpecialistRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, SpecialistRepository $repository)
    {
        $data = $request->validated();
        $forms = $repository->create($data);
        if($forms){
            return $this->apiResponse->successResponse('Especialista criado :)', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Specialist\UpdateRequest  $request
     * @param  \App\Repositories\SpecialistRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, SpecialistRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        $forms = $repository->update($uuid, $data);
        if($forms){
            return $this->apiResponse->successResponse('Especialista atualizado :)', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\SpecialistRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialistRepository $repository)
    {
        $forms = $repository->getSpecialistByWorkspaceId();
      
        if($forms){
            return $this->apiResponse->successResponse('List of Forms', $forms->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Destroy a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Specialist\DeleteRequest  $request
     * @param  \App\Repositories\SpecialistRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, SpecialistRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        
        $forms = $repository->delete($uuid);
        if($forms){
            return $this->apiResponse->successResponse('Especialista deletado :)', []);
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }
}
