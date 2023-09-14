<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            Item::create([
               'subject' => $data['subject'],
               'text' => $data['text'],
               'year' => $data['year'],
               'month' => $data['month'],
               'date' => $data['date'],
               'done' => $data['done'],
               'user_id' => Auth::id(),
                'timestamp' => $data['timestamp']
            ]);
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
