<?php
/*
 *  ______     __  __     ______     ______     __   __   ______     __
 * /\  == \   /\ \/\ \   /\___  \   /\___  \   /\ \ / /  /\  ___\   /\ \
 * \ \  __<   \ \ \_\ \  \/_/  /__  \/_/  /__  \ \ \'/   \ \  __\   \ \ \____
 *  \ \_____\  \ \_____\   /\_____\   /\_____\  \ \__|    \ \_____\  \ \_____\
 *   \/_____/   \/_____/   \/_____/   \/_____/   \/_/      \/_____/   \/_____/
 *
 * Made By: Franklys Guimarães
 *
 * ♥ BY Buzzers: BUZZVEL.COM
 * Last Update: 2022.9.09
 */

namespace App\Repositories;

use App\Models\UserWorkspace;
use Illuminate\Support\Facades\Auth;

class BaseRepository
{
    protected $model;
    protected $take = 10;

    public function __construct($model)
    {
        $this->model = new $model;
    }

    public function exists($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($uuid, $data)
    {
        $record = $this->getByUuid($uuid);
        $record->update($data);
        return $record;
    }

    public function getWorkspaceByUserId() {
        $user = Auth::user();
        $workspace = UserWorkspace::where('user_id', $user->id)->first();
        return $workspace;
    }

    public function getByUuid($uuid, $relationships = [])
    {
        if ($relationships) {
            return $this->model->with($relationships)->where('uuid', $uuid)->paginate(10)->firstOrFail();
        }
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function delete($id)
    {
        $record = $this->getById($id);
        $record->delete();
        return $record;
    }

    public function getById($id, $relationships = [])
    {
        if ($relationships) {
            return $this->model->with($relationships)->findOrFail($id);
        }
        return $this->model->findOrFail($id);
    }

    public function deleteByUuid($uuid)
    {
        $record = $this->getByUuid($uuid);
        $record->delete();
        return $record;
    }

    public function getWithPaginate($limit = 0, $offset = 0)
    {
        return $this->model->offset((int)$offset)->limit((int)$limit)->get();
    }

    public function get($take = 0, $columns = ["*"], $relationships = [])
    {
        if ($take === 0) {
            $take = $this->take;
        }

        if ($relationships) {
            return $this->model->with($relationships)->paginate($take, $columns);
        }
        return $this->model->paginate($take, $columns);
    }

    public function filter($filters, $queryParams = [], $relationships = [], $appends = [])
    {

        $query = $this->model->newQuery();

        if ($relationships) {
            $query = $this->model->with($relationships)->newQuery();
        }

        $columns = $filters['columns'] ?? ['*'];
        $take = $filters['take'] ?? $this->take;

        if ($queryParams) {
            foreach ($queryParams as $key => $value) {
                $query->where($key, $value);
            }
        }

        if (isset($filters['search'])) {
            $search = $filters['search'];

            $query->where(function ($query) use ($search) {
                $searchFields = empty($this->model->searchFields) ? ['name'] : $this->model->searchFields;
                foreach ($searchFields as $searchField) {
                    $query->orWhere($searchField, 'like', '%' . $search . '%');
                }
            });

            if ($relationships) {
                foreach ($relationships as $relationship) {
                    $searchFields = empty($this->model->searchFields) ? ['name'] : $this->model->searchFields;
                    foreach ($searchFields as $searchField) {
                        $query->orWhereRelation($relationship, $searchField, 'like', '%' . $search . '%');
                    }

                }
            }
        }


        if (isset($filters['sortBy'])) {
            $sortDirection = $filters['sortDirection'] ?? 'ASC';
            $query->orderBy($filters['sortBy'], $sortDirection);
        }


        if ($appends) {
            return $query->paginate($take, $columns)->setAppends($appends);
        }
        return $query->paginate($take, $columns);

    }

}