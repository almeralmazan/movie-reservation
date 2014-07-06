<?php

class AdminController extends BaseController {

    public function index()
    {
        $title = 'Admin Page';
        return View::make('admin.index', compact('title'));
    }

    public function dashboard()
    {
        $title = 'Admin Dashboard Page';
        return View::make('admin.dashboard', compact('title'));
    }
}