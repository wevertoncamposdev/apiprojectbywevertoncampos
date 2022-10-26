<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Group as Model;
use App\Models\Campaign;
use App\Models\Citie;

use Exception;

class GroupService
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

            $data = $this->data->where('uuid', '=', $uuid)->get();
            return $data->load('campaign.products');
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    public function create($request)
    {
        try {

            $campaign = Campaign::whereUuid($request->campaign_uuid)->first();
            DB::beginTransaction();
            $data = $this->data->create([
                'campaign_id' => $campaign->id,
                'name' => $request->name,
                'description' => $request->description,
            ]);
            DB::commit();

            $group = $this->data->whereUuid($data->uuid)->first();

            foreach ($request->cities as $cities) {

                DB::beginTransaction();
                Citie::whereUuid($cities)->update([
                    'group_id' => $group->id
                ]);
                DB::commit();
            }

            return $this->data->whereUuid($data->uuid)->with('cities')->get();

        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($request, $uuid)
    {
        try {
            
            $campaign = Campaign::whereUuid($request->campaign_uuid)->first();

            DB::beginTransaction();
            
            $this->data->whereUuid($uuid)->update([
                'campaign_id' => $campaign->id,
                'name' => $request->name,
                'description' => $request->description,
            ]);

            $group = $this->data->whereUuid($uuid)->first();

            foreach ($request->cities as $cities) {

                DB::beginTransaction();
                Citie::whereUuid($cities)->update([
                    'group_id' => $group->id
                ]);
                DB::commit();
            }

            DB::commit();
            return $this->data->where('uuid', '=', $uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function delete($uuid)
    {
        try {
            DB::beginTransaction();
            $data = $this->data->where('uuid', '=', $uuid)->delete();
            DB::commit();
            return $this->data->withTrashed()->where('uuid', '=', $uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
