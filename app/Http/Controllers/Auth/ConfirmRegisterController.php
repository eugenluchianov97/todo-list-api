<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmRegisterRequest;
use App\Mail\ConfirmRegistrationMail;
use App\Models\ConfirmPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ConfirmRegisterController extends Controller
{

    public function __invoke(ConfirmRegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $confirmPassword = confirmPassword::firstWhere('code', $data['code']);
            if(!$confirmPassword){
                return response()->json([
                    'status' => false,
                ], 400);
            }
            $user = User::firstWhere('id', $confirmPassword['user_id']);



            $user->markEmailAsVerified();
            $confirmPassword->delete();

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
