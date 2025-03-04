<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin_LoginRequest;
use App\Services\Admin\Admin_AuthService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    public function __construct(protected Admin_AuthService $auth_service)
    {
        // $this->middleware(['auth:dash', 'role:admin'])->except(['login','refresh']);
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.admin-lock-screen');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'user_name';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {

        return Auth::guard('admin');
    }

    public function login(Admin_LoginRequest $request)
    {

        $input_data = $request->validated();

        $result = $this->auth_service->login($input_data);


        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.dashboard.index')->withSuccess($result['msg']);

        }

    }

    public function logout()
    {
        $result = $this->auth_service->logout();

        $output = [];
        if ($result['status_code'] == 200) {
            $result_data = $result['data'];
            // response data preparation:
        }

        return redirect()->route('admin.auth.lock')->with('success', 'Logged Out');

    }


    public function dashboard(Request $request)
    {
        return view('admin.admin_index');
    }
}
