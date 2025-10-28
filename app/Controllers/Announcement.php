<?php
namespace App\Controllers;

use App\Models\UserModel;

class Announcement extends BaseController {

    /**midterm exam */
     /**task 1 */
    public function index() {
        return view('announcements');
    }
}