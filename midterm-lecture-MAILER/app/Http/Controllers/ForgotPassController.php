<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMailer;
use Illuminate\Support\Facades\Log;

class ForgotPassController extends Controller
{

    public function showForgotPasswordForm()
    {
        return view('forgotPassword');
    }

    public function handleForgotPassword(Request $request)
    {
        try{
            $request->validate([
                        'email' => 'required|email|exists:users,email',
            ]);
        }
        catch(\Illuminate\Validation\ValidationException $e){
            return back()->with('error', 'The provided email does not exist in our records.');
        }


        $otp = "676767";

        // return back()->with('error', 'Failed to send OTP. Please try again.');

        // $user = User::where('email', $request->email)->first();
        // $user->otpCode = $otp;
        // $user->save();

        $name = "Jules Irwin and asdasd";


        try{
            Mail::to($request->email)->send(new OtpMailer($otp, $name));
            Log::info('OTP email sent to ' . $request->email);
        } catch (\Exception $e) {
            Log::error('Failed to send OTP email: ' . $request->email . ' - ' . $e->getMessage());
            return back()->with('error', 'Failed to send OTP. Please try again.');
        }

        return back()->with('status', 'OTP has been sent to your email address.');
    }


    public static function generateOTP(): string
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

}
