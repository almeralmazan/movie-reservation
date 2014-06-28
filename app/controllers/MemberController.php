<?php

class MemberController extends BaseController {

    public function index()
    {
        $title = 'Member Page';
        return View::make('member.index', compact('title'));
    }

    public function register()
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
}