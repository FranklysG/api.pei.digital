<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\DeleteRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreRequest  $request
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, UserRepository $repository)
    {
        $data = $request->validated();
        $user = $repository->create($data);
        if($user){
            return $this->apiResponse->successResponse('Usuario criado :)', $user->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateRequest  $request
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UserRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        $user = $repository->update($uuid, $data);
        if($user){
            return $this->apiResponse->successResponse('Usuario atualizado :)', $user->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(UserRepository $repository)
    {
        $user = $repository->getUserByWorkspaceId();
      
        if($user){
            return $this->apiResponse->successResponse('List of Forms', $user->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Destroy a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\DeleteRequest  $request
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, UserRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        
        $user = $repository->delete($uuid);
        if($user){
            return $this->apiResponse->successResponse('Usuario deletado :)', []);
        }else {
            return $this->apiResponse->errorResponse('Parece que esse usuario tem fomulario vinculado', []);
        }
    }
}
