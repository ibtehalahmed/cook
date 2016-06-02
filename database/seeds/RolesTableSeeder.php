<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Role();
        $customer->name         = 'customer';
        $customer->display_name = 'Customer'; // optional
        $customer->description  = 'customer is the who can order meals'; // optional
        $customer->save();
        
        $chef = new Role();
        $chef->name         = 'chef';
        $chef->display_name = 'Chef'; // optional
        $chef->description  = 'chef is the who can prepare meals'; // optional
        $chef->save();
        
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'admin'; // optional
        $admin->description  = 'Admin is the one who control operations in the application'; // optional
        $admin->save();
    }
}
