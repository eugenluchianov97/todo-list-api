<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\SendCodeRequest;
use App\Mail\ResetPasswordMail;
use App\Models\ResetPasswordCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendCodeController extends Controller
{

    public function __invoke(SendCodeRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $user = User::where('email',$data['email'])->first();
            $code =  mt_rand(1000000000, 9999999999);

            ResetPasswordCode::create([
                 'code' => $code,
                 'user_id' =>$user->id
            ]);

            Mail::to($data['email'])->send(new ResetPasswordMail($code));


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
