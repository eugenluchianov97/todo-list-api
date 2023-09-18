<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $items = User::find(1)->items()
                ->where('month',$request->month)
                ->where('year',$request->year )->get();
            return response()->json([
                'status' => true,
                'items' => $items
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
