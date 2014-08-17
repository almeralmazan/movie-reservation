<?php

class SessionController extends BaseController {

    public function memberLogin()
    {
        // Using Auth::attempt, no need for password to be hash
        $credentials = Auth::attempt([
            'email'     =>  Input::get('email'),
            'password'  =>  Input::get('password'),
            'active'    =>  1
        ]);

        if ( ! $credentials)
        {
            return Response::json([
                'success' => false,
                'message' => 'Invalid email/password input'
            ]);
        }
        else
        {
            $user = User::where('email', Input::get('email'))->first();

            Session::put('user_id', $user->id);
            Session::put('member_name', $user->first_name);
            Session::put('email', Input::get('email'));
            Session::put('mobile_number', $user->mobile_number);

            return Response::json(['success' => true]);
        }

    }

    public function memberLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function adminLogin()
    {
        // Using Auth::attempt, 'password' is automatically Hash::make()
        $credentials = Auth::attempt(array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'admin' => 1
        ));

        if ($credentials) return Redirect::to('admin/dashboard');

        return Redirect::back()->withMessage('Sorry, only the administrator allowed here');
    }

    public function adminLogout()
    {
        Auth::logout();
        return Redirect::to('admin');
    }
}