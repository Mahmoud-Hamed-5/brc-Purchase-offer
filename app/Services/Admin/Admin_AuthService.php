<?php
namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class Admin_AuthService
{

    public function login(array $input_data)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        $credentials = [
            'user_name' => $input_data['user_name'],
            'password' => $input_data['password'],
        ];


        if (!Auth::guard('admin')->attempt($credentials)) {

            $status_code = 404;
            $msg = 'Please Check your Username and Password';
        } else {

            $user = Auth::guard('admin')->user();

            $redirection_route = '';

            switch ($user->role) {
                case Admin::ROLE_PURCHASE_ADMIN:
                    $redirection_route = route('admin.purchase_offers.index');
                    break;

                case Admin::ROLE_SUPER_ADMIN:
                    $redirection_route = route('admin.purchase_offers.index');
                    break;
            }

            $data = [
                'user' => $user,
                'redirection_route' => $redirection_route,
            ];
            $status_code = 200;
            $msg = 'logged In';
        }

        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;


    }


    //logoutAdmin
    public function logout()
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        auth('admin')->logout();

        $msg = 'تم تسجيل الخروج بنجاح';
        $status_code = 200;
        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }
}

