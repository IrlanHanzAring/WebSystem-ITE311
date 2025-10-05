<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Auth extends Controller
{
    /**
     * Show registration form and handle new user creation
     */
    public function register()
    {
        helper('form');
        $data = [];

        if ($this->request->is('post')) {
            $validationRules = [
                'name'            => 'required|min_length[3]|max_length[50]',
                'email'           => 'required|valid_email|is_unique[users.email]',
                'password'        => 'required|min_length[8]|max_length[255]',
                'password_confirm'=> 'matches[password]',
            ];

            if ($this->validate($validationRules)) {
                $db = Database::connect();
                $builder = $db->table('users');

                $userRecord = [
                    'name'       => $this->request->getPost('name'),
                    'email'      => $this->request->getPost('email'),
                    'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role'       => 'student',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if ($builder->insert($userRecord)) {
                    return redirect()->to(site_url('login'))
                                     ->with('success', 'Your account has been created. Please login.');
                }

                $data['error'] = 'Unable to save user data. Try again later.';
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/register', $data);
    }

    /**
     * Display login form and authenticate user
     */
    public function login()
    {
        helper('form');
        $data = [];

        if ($this->request->is('post')) {
            $loginRules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];

            if ($this->validate($loginRules)) {
                $email    = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $db = Database::connect();
                $user = $db->table('users')->where('email', $email)->get()->getRow();

                if ($user && password_verify($password, $user->password)) {
                    $session = session();
                    $session->set([
                        'uid'       => $user->id,
                        'fullname'  => $user->name,
                        'email'     => $user->email,
                        'role'      => $user->role,
                        'logged_in' => true,
                    ]);

                    return redirect()->to(site_url('dashboard'));
                }

                $data['error'] = 'Invalid email or password.';
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/login', $data);
    }

    /**
     * Dashboard page (protected route)
     */
    public function dashboard()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to(site_url('login'))
                             ->with('error', 'Please log in to access the dashboard.');
        }

        return view('auth/dashboard');
    }

    /**
     * Logout and destroy session
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
