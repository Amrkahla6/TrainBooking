<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $authRepository;

    public function __construct(AuthRepositoryInterface $modelRepository)
    {
        $this->authRepository = $modelRepository;
    }


    /**
     * @param LoginRequest $request
     * @return object
     * Login using Email Or Phone
     */
    protected function attemptLogin(LoginRequest $request) : object
    {
        $credentials = $this->authRepository->credentials($request);

        if ($user = $this->authRepository->userLogin($credentials['email'], $credentials['password'])) {
            Auth::guard()->login($user, $request->filled('remember'));
            return redirect()->route('home');
        }
        return redirect()->route('user.login')->withErrors(['email' => trans('auth.failed')]);
    }//end login function

}
