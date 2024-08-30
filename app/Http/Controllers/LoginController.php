<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            // get the user information
            $user = User::where('email', $request->email)->first();
    
            if(empty($user))
            {
                return response()->json([
                    'message' => '404 not found'
                ]);
            }
            
            if(!Hash::check($request->password, $user->password))
            {
                return response()->json([
                    'message' => 'Invalid Credentials'
                ], 404);
            }

            // Generating OTP code   
            $otp = rand(100000, 999999);
            $user->otp_code = Hash::make($otp);
            $user->save();
    
            // send otp code to user login
            // Http::withoutVerifying()->post(env('SEMAPHORE_URI'), [
            //     'apikey' => env('SEMAPHORE_API_KEY'),
            //     'number' => env('SMS_NUMBER'),
            //     'message' => 'Your OTP code is: ' . $otp
            // ]);
            
            // Mail::to($user->email)->send(new UserOtpMail($otp, $user->email));
            
            // return a message
            return response()->json([
                'message' => 'Otp sent successfully',
                'otp' => $otp,
            ]);

        } catch (\Exception $sms) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred: ' . $sms->getMessage()
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
{
    try {
        $request->validate([
            'otp_code' => 'required',
            'email' => 'required|email', // Ensure email is also validated
        ]);

        // Get user information based on the email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and if the OTP matches
        if (!$user || !Hash::check($request->otp_code, $user->otp_code)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
        
        // Reset the OTP after successful verification
        $user->otp_code = null;
        $user->save();

        // Generate token
        $token = $user->createToken('token');

        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully',
            'access_token' => $token->plainTextToken
        ], 200);

    } catch (\Exception $sms) {
        return response()->json([
            'status' => false,
            'message' => 'An error occurred: ' . $sms->getMessage()
        ], 500);
    }
}


    public function loginForm()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('home');
    }
}
