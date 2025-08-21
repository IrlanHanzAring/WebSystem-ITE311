<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'        => 'admin',
                'email'           => 'admin@lms.com',
                'password'        => password_hash('admin123', PASSWORD_DEFAULT),
                'first_name'      => 'System',
                'last_name'       => 'Administrator',
                'role'            => 'admin',
                'profile_picture' => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'username'        => 'instructor1',
                'email'           => 'instructor1@lms.com',
                'password'        => password_hash('instructor123', PASSWORD_DEFAULT),
                'first_name'      => 'John',
                'last_name'       => 'Doe',
                'role'            => 'instructor',
                'profile_picture' => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'username'        => 'student1',
                'email'           => 'student1@lms.com',
                'password'        => password_hash('student123', PASSWORD_DEFAULT),
                'first_name'      => 'Jane',
                'last_name'       => 'Smith',
                'role'            => 'student',
                'profile_picture' => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'username'        => 'student2',
                'email'           => 'student2@lms.com',
                'password'        => password_hash('student123', PASSWORD_DEFAULT),
                'first_name'      => 'Mike',
                'last_name'       => 'Johnson',
                'role'            => 'student',
                'profile_picture' => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}