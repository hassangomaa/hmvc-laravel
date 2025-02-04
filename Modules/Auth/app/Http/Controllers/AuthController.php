<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception; // Import Exception for error handling
use Modules\User\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [

            "name" => "required|string|max:255",
            "email" => "required|string|max:255|unique:users",
            "password" => "required|string|min:6",

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Start a database transaction
            DB::beginTransaction();
            $token = '1111';
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "lang" => $request->lang ?? 'en',
                "country_code" => $request->country_code ?? '+20',
                "password" => bcrypt($request->password),
                'email_verification_token' => $token,
                'email_verified_at' => now(),
            ]);


            DB::commit();

            $token = $authToken = $user->createToken('auth-token')->plainTextToken;



            return response()->json([
                'message' => 'check your email to verify your account',
                'token' => $token,
                'user' => $user
            ], 200);



        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }


    public function deleteAccount(Request $request)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            // Get the authenticated user
            $user = Auth::user();

            // Delete the user
            $user->delete();

            // Logout the user by revoking all tokens
            auth()->user()->tokens()->delete();

            // Commit the transaction
            DB::commit();

            return response()->json([
                'message' => 'Your account has been successfully deleted.'
            ], 200);
        } catch (\Exception $e) {
            // Rollback transaction in case of an error
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request)
    {
        $id = $request->user()->id;
        $validator = Validator::make($request->all(), [

            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users,email," . $id,
            "password" => "required|string|min:6",

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create and save user
        $user = User::findOrFail($id);
        $user->update([

            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "user_type" => $request->user_type,
        ]);
        // return the updated user with a token
        $token = JWTAuth::fromUser($user);

        return response()->json(
            [
                'token' => $token,
                'user' => $user,
            ]
        );
    }


    public function login(Request $request)
    {
        // Validate the request parameters
        $validator = Validator::make($request->all(), [
            'emailOrPhone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check if the input is in email format
        $isEmail = filter_var($request->input('emailOrPhone'), FILTER_VALIDATE_EMAIL);

        // Determine the field name to search based on the input type
        $fieldName = $isEmail ? 'email' : 'phone';


        // Attempt to authenticate the user based on email or phone number
        if (!Auth::attempt([$fieldName => $request->input('emailOrPhone'), 'password' => $request->input('password')])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // dd($fieldName);

        $user = auth()->user();

        if ($user->email_verified_at == null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Account not verified'
            ]);
        }

        $token = $authToken = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }



    #profile
    public function profile()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {

        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }


}
