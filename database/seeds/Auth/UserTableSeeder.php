<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Lemi',
            'email' => 'lemi@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);
        
        // Add the master administrator, user id of 2
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Liyu',
            'email' => 'liyu@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);
        
        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Megersa',
            'email' => 'megersa@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);
         // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Darge',
            'email' => 'darge@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);
        
         User::create([
            'first_name' => 'Super',
            'last_name' => 'Worku',
            'email' => 'worku@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        $this->enableForeignKeys();
    }
}
