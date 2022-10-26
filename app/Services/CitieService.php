<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Citie as Model;
use App\Models\Group;

use Exception;

class CitieService
{
    
    protected $data;

    public function __construct(Model $data)
    {
        $this->data = $data;
    }

    /**
     * Get all of the models from the database.
     */
    public function getAll()
    {
        try {

            $data = $this->data->all();
            return $data;
        } catch (Exception $e) {

            return $e->getMessage();
        }
    }

    /**
     * Get only of the models from the database.
     */
    public function getOnly($uuid)
    {
        try {

            $data = $this->data->whereUuid($uuid)->get();
            return $data;
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    public function create($request)
    {
        try {
            DB::beginTransaction();
            $data = $this->data->create($request);
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($request,$uuid)
    {   
        $group = Group::whereUuid($request->group_uuid)->first();
        try {
            DB::beginTransaction();
            $this->data->whereUuid($uuid)->update([
                'name'=> $request->name,
                'group_id'=> $group->id
            ]);
            DB::commit();
            return $this->data->whereUuid($uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function delete($uuid)
    {
        try {
            DB::beginTransaction();
            $data = $this->data->whereUuid($uuid)->delete();
            DB::commit();
            return $this->data->withTrashed()->whereUuid($uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
