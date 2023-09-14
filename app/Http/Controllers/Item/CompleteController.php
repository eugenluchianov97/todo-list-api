<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class CompleteController extends Controller
{
    public function __invoke(Item $item): \Illuminate\Http\JsonResponse
    {

        try {
            $item->done = true;
            $item->save();
            return response()->json([
                'status' => true,
            ], 200);
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
