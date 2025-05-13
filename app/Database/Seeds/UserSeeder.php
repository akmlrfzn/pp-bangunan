<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Models\GroupModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $groupModel = new GroupModel();

        // Buat user baru
        $user = new User([
            'username'       => 'admin',
            'status'         => 'active',
            'status_message' => 'Seeder created user',
            'active'         => true,
            'created_at'     => Time::now(),
        ]);

        // Set password
        $user->setPassword('admin123');

        // Simpan user
        $userModel->save($user);

        // Dapatkan ID user yang baru dibuat
        $userId = $userModel->getInsertID();

        // Tambahkan ke grup 'admin'
        $groupModel->addUserToGroup($userId, 'admin');
    }
}
