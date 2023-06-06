<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepositoryInterface $modelRepository)
    {
        $this->authRepository = $modelRepository;
    }

    public function index()
    {
        return view('admins.home');
    }


    /**
     * @param Request $request
     * @return object
     * Login using Email Or Phone
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->authRepository->credentials($request);

        if ($user = $this->authRepository->adminLogin($credentials['email'], $credentials['password'])) {
            Auth::guard('admin')->login($user, $request->filled('remember'));
            return redirect()->route('admin.home');
        }
        return view('admins.auth.login')->withErrors(['email' => trans('auth.failed')]);
    }


    public function logout( Request $request )
    {
        if(Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
