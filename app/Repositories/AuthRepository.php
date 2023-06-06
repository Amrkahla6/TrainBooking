<?php


namespace App\Repositories;


use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function userLogin($emailOrPhone, $password)
    {
        // TODO: Implement userLogin() method.
        // Determine if the user is logging in with email or phone
        $field = filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Attempt to authenticate the user
        $user = User::where($field, $emailOrPhone)->first();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public function adminLogin($username, $password)
    {
        // TODO: Implement adminLogin() method.
        $admin = Admin::where('username', $username)->first();

        if ($admin && password_verify($password, $admin->password)) {
            return $admin;
        }

        return null;
    }


    public function credentials($request)
    {
        // TODO: Implement credentials() method.
        return $request->only('email', 'password');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        // TODO: Implement guard() method.
        return Auth::guard();
    }
}
