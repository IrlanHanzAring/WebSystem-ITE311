<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {

    /**midterm exam */
    public function index() {
        return view('announcements');
    }
}