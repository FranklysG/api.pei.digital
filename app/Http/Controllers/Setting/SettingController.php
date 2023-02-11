<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreRequest;
use App\Http\Requests\Setting\UpdateRequest;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Setting\StoreRequest  $request
     * @param  \App\Repositories\SettingRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, SettingRepository $repository)
    {
        $data = $request->validated();
        $settings = $repository->create($data);
        if($settings){
            return $this->apiResponse->successResponse('Configurações salvas :)', $settings->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Setting\UpdateRequest  $request
     * @param  \App\Repositories\SettingRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, SettingRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        
        $settings = $repository->update($uuid, $data);
        if($settings){
            return $this->apiResponse->successResponse('Configurações atualizadas :)', $settings->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\SettingRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(SettingRepository $repository)
    {
        $settings = $repository->getSettingByUser();
        
        if($settings){
            return $this->apiResponse->successResponse('List of settings', $settings->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }
}
