<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models;
use Exception;

class TrashService
{

    /**
     * Get all of the models from the database.
     */
    public function getAllTrashed($table)
    {
        switch ($table) {
            case 'cities':
                return Models\Citie::onlyTrashed()->get();
                break;
            case 'groups':
                return Models\Group::onlyTrashed()->get();
                break;
            case 'products':
                return Models\Product::onlyTrashed()->get();
                break;
            case 'campaigns':
                return Models\Campaign::onlyTrashed()->get();
                break;
        }
    }
}
