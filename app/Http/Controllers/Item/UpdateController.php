<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\UpdateRequest;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request,Item $item): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $item->update([
                'subject' => $data['subject'],
                'text' => $data['text'],
                'datetime' => Carbon::parse($data['date'] . 'T'.$data['time'])->format('Y-m-d H:i:s') ,
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
