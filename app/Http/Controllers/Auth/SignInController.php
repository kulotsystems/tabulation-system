<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SignInController extends Controller
{
    /****************************************************************************************************
     * Handle user sign in
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function sign_in(Request $request)
    {
        $request->validate([
            'username' => 'string|required',
            'password' => 'string|required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response([
                'signed_in' => true
            ]);
        }

        throw ValidationException::withMessages([
            'username' => ['Invalid username or password']
        ]);
    }


    /****************************************************************************************************
     * Get signed in user
     *
     * @param Request $request
     * @return Response
     */
    public function get_user(Request $request)
    {
        $user = $request->user();
        return response([
            'user' => $user
        ]);
    }


    /****************************************************************************************************
     * Sign out user
     *
     * @param Request $request
     * @return Response
     */
    public function sign_out(Request $request)
    {
        Auth::guard('web')->logout();
        return response([
            'signed_out' => true
        ]);
    }
}
