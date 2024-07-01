<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        $requestDecryptData = $request->all();
        if (empty($requestDecryptData)) {
            return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
        }

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        $messages = [
            'email.required' => 'Your email address is required.',
            'email.email' => 'Your email address is not a valid email.',
            'password.required' => 'Password is required.',
            'password.min' => 'The password must be at least 6 character',
        ];

        $validator = Validator::make($requestDecryptData, $rules, $messages);

        if ($validator->fails()) {
            $validator = $validator->errors();
            $email = $validator->first('email');
            $password = $validator->first('password');
            if (!empty($email)) {
                $error = $email;
            } else if (!empty($password)) {
                $error = $password;
            }
            return response()->json(['res_code' => 201, 'response' => $error], 200);
        } else {
            try {
                $userdata = array(
                    'email' => trim($requestDecryptData['email']),
                    'password' => trim($requestDecryptData['password']),
                );
                if (Auth::attempt($userdata)) {
                    $user = Auth::user();

                    $status = !empty($user['status']) ? trim($user['status']) : 'Inactive';

                    if ($status == 'Inactive') {
                        return response()->json(['res_code' => 201, 'response' => 'Your account has inactive, please contact Admin at info@example.com'], 200);
                    } else {
                        return response()->json([
                            'res_code' => 200,
                            // 'response' => 'Email id/phone no is not verified.',
                            'data' => array(
                                'email' => !empty($user['email']) ? $user['email'] : '',
                                'mobile_code' => !empty($user['dail_code']) ? $user['dail_code'] : '0',
                                'mobile_number' => !empty($user['mobile_number']) ? $user['mobile_number'] : '',
                                'token' => $user->createToken('Vidhi Vidhan')->plainTextToken,
                                // 'token' => $user->createToken('Vidhi Vidhan')->accessToken,
                                'token_type' => 'Bearer',
                            )
                        ], 200);
                    }
                }else{
                    return response()->json(['res_code' => 201, 'response' => 'Invalid Email/password.'], 200);
                }
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $th->getMessage()], 200);

            }
        }
    }


    public function registration(Request $request)
    {
          
    }
}
