<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create(
            [
                'email' => 'jsposato@mobiquityinc.com',
                'password' => Hash::make('codiesassy'),
                'name' => 'John Sposato',
            ]
        );
    }

}
