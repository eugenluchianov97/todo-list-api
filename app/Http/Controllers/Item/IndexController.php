<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\Item\IndexResource;
use App\Models\Item;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $items = Auth::user()->items()
                ->whereYear('created_at', '=',$request->year)
                ->whereMonth('datetime', '=', $request->month)
                ->whereDay('datetime','=',$request->date)
                ->get();


            return response()->json([
                'status' => true,
                'items' =>  IndexResource::collection($items)
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
