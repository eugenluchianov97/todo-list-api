<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreRequest;
use App\Models\Item;
use Carbon\Carbon;
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
               'datetime' => Carbon::createFromFormat('Y-m-d H:i',$data['date'] . ' '.$data['time'])->format('Y-m-d H:i:s') ,
               'done' => $data['done'],
               'user_id' => Auth::id()
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
