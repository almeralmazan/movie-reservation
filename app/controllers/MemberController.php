<?php

class MemberController extends BaseController {

    public function index()
    {
        $title = 'Member Page';
        return View::make('member.index', compact('title'));
    }

}