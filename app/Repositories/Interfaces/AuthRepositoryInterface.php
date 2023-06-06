<?php


namespace App\Repositories\Interfaces;


use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function userLogin($emailOrPhone, $password);
    public function adminLogin($username, $password);
    public function credentials($request);
    public function guard();
}
