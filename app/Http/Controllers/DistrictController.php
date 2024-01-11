<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    public function getDistrictsByDivisionId($id): JsonResponse
    {
        $districts = District::where('division_id', $id)->get();
        return response()->json($districts);
    }
}
