<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workspace\DeleteRequest;
use App\Http\Requests\Workspace\StoreRequest;
use App\Repositories\WorkspaceRepository;

class WorkspaceController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Workspace\StoreRequest  $request
     * @param  \App\Repositories\WorkspaceRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, WorkspaceRepository $repository)
    {
        $data = $request->validated();
        $workspace = $repository->create($data);
        if($workspace){
            return $this->apiResponse->successResponse('Workspace created with success', $workspace->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repositories\WorkspaceRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(WorkspaceRepository $repository)
    {
        $workspaces = $repository->getWorkspacesByUser();
        if($workspaces){
            return $this->apiResponse->successResponse('List of workspace', $workspaces->toArray());
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Repositories\WorkspaceRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, WorkspaceRepository $repository)
    {
        $data = $request->validated();
        $uuid = $data['uuid'];
        $status = $repository->delete($uuid);

        if($status){
            return $this->apiResponse->successResponse('Workspace deleted with success', []);
        }else {
            return $this->apiResponse->errorResponse('Error deleting', []);

        }
    }
}
