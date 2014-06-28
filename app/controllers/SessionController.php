<?php

class SessionController extends BaseController {

    public function memberLogin()
    {
            // Using Auth::attempt, no need for password to be hash
            $credentials = Auth::attempt([
                'email' => Input::get('email'),
                'password' => Input::get('password')
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
            'password' => Input::get('password')
        ));

        if ($credentials) return Redirect::to('admin/dashboard');

        return Redirect::back();
    }

    public function adminLogout()
    {
        Auth::logout();
        return Redirect::to('admin');
    }
}