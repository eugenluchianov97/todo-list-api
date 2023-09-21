<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $items = Auth::user()->items()
                ->whereYear('datetime', '=',$request->year)
                ->whereMonth('datetime', '=', $request->month)
                ->get();
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
