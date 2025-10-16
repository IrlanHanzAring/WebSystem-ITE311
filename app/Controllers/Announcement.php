<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {

    public function index() {
        return view('announcements');
    }
}