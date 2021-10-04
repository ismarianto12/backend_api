<?php

namespace App\Http\Controllers;

use App\Models\Tmlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use  App\Models\User;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    protected $request;
    public function __construct(Request $request)
    {

        header("Access-Control-Allow-Origin: *");
        $this->request = $request;
    }
    // public function register(Request $request)
    // {
    //     //validate incoming request 
    //     $this->validate($this->request, [
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:tmlogin',
    //         'password' => 'required',
    //     ]);
    //     try {

    //         $tmlogin        = new Tmlogin;
    //         $tmlogin->name  = $request->input('name');
    //         $tmlogin->email = $request->input('email');
    //         $plainPassword  = $request->input('password');
    //         $tmlogin->password = app('hash')->make($plainPassword);

    //         $tmlogin->save();

    //         //return successful response
    //         return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
    //     } catch (\Exception $e) {
    //         //return error message
    //         return response()->json(['message' => 'User Registration Failed!'], 409);
    //     }
    // }


    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        //validate incoming request 
        // dd($request->all());
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
