<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Campaign as Model;
use App\Models\Product;

use Exception;

class CampaignService
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
            return $data->load('products');
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
            return $data->load('products');
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    public function create($request)
    {
        try {

            DB::beginTransaction();

            $data = $this->data->create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            DB::commit();


            $campaign = $this->data->whereUuid($data->uuid)->first();

            foreach ($request->products as $products) {

                $product = Product::whereUuid($products['uuid'])->first();

                DB::beginTransaction();
                $campaign->products()->attach($product->id, [
                    'product_discount' => $products['product_discount']
                ]);
                DB::commit();
            }

            return $this->data->whereUuid($data->uuid)->with('products')->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($request, $uuid)
    {
        /*  try {
            DB::beginTransaction();
            $this->data->where('uuid', '=', $uuid)->update($request);
            DB::commit();
            return $this->data->where('uuid', '=', $uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        } */


        DB::beginTransaction();

        $this->data->whereUuid($uuid)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        DB::commit();

        $campaign = $this->data->whereUuid($uuid)->first();

        foreach ($request->products as $products) {
            $product = Product::whereUuid($products['uuid'])->first();

            DB::beginTransaction();
            $campaign->products()->updateExistingPivot($product->id, [
                'product_discount' => $products['product_discount']
            ]);
            DB::commit();
        }

        return $this->data->whereUuid($uuid)->with('products')->get();
    }

    public function delete($uuid)
    {
        try {

            $campaign = $this->data->whereUuid($uuid)->with('products')->first();
            DB::beginTransaction();
            $campaign->products()->detach();
            $this->data->whereUuid($uuid)->delete();
            DB::commit();

            return $this->data->withTrashed()->whereUuid($uuid)->get();

        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        //$user->roles()->detach([1, 2, 3]);
    }

}
