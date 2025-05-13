<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tambah grup/role ke auth_groups
        $this->db->table('auth_groups')->insertBatch([
            [
                'name'        => 'admin',
                'description' => 'Administrator'
            ],
            [
                'name'        => 'user',
                'description' => 'Regular User'
            ],
        ]);

        // Tambah admin user manual
        $this->db->table('users')->insert([
            'username'      => 'adminuser',
            'email'         => 'admin@example.com',
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
            'active'        => 1,
        ]);

        $adminId = $this->db->insertID();

        // Masukkan ke grup admin
        $this->db->table('auth_groups_users')->insert([
            'user_id' => $adminId,
            'group'   => 'admin',
        ]);

        // Tambah user biasa
        $this->db->table('users')->insert([
            'username'      => 'testuser',
            'email'         => 'test@example.com',
            'password_hash' => password_hash('testpass', PASSWORD_DEFAULT),
            'active'        => 1,
        ]);

        $userId = $this->db->insertID();

        // Masukkan ke grup user
        $this->db->table('auth_groups_users')->insert([
            'user_id' => $userId,
            'group'   => 'user',
        ]);
    }
}
