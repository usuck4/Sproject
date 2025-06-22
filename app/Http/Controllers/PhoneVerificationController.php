<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\PhoneVerificationService;


class PhoneVerificationController extends Controller
{
    public function sendCode(Request $request)
    {
        $request->validate(['phone' => 'required|unique:users']);
        
        $code = (new PhoneVerificationService())->sendVerificationCode($request->phone);
        
        $request->user()->update([
            'phone' => $request->phone,
            'phone_verification_code' => bycrbt($code)
        ]);
        
        return response()->json(['message' => 'Verification code sent']);
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);
        
        $user = $request->user();
        
        if (!Hash::check($request->code, $user->phone_verification_code)) {
            return response()->json(['error' => 'Invalid code'], 422);
        }
        
        $user->update([
            'phone_verified_at' => now(),
            'phone_verification_code' => 0
        ]);
        
        return response()->json(['message' => 'Phone verified successfully']);
    }
}
