<?php


namespace App\Repositories;


use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{

    /**
     * @param $emailOrPhone
     * @param $password
     * @return User|null
     */
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
    }//end user login function

    /**
     * @param $username
     * @param $password
     * @return null
     */
    public function adminLogin($username, $password)
    {
        // TODO: Implement adminLogin() method.
        $admin = Admin::where('username', $username)->first();

        if ($admin && password_verify($password, $admin->password)) {
            return $admin;
        }

        return null;
    }//end admin login function


    /**
     * @param $request
     * @return array
     */
    public function credentials($request) : array
    {
        // TODO: Implement credentials() method.
        return $request->only('email', 'password');
    }//end credentials function

}//end class
