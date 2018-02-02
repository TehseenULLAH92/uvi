<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Administration',
        'firstname' => 'Admin',
        'lastname' => 'LTE',
        'company_id' => '1',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin@gmail.com'),
        'role' => 'admin',
      ]);
      DB::table('users')->insert([
          'name' => 'Car Rental Companies',
          'firstname' => 'Car',
          'lastname' => 'Rental',
          'company_id' => '2',
          'email' => 'crcompanies@gmail.com',
          'password' => bcrypt('crcompanies@gmail.com'),
          'role' => 'crcompanies',
      ]);
      DB::table('users')->insert([
          'name' => 'Insurance Companies',
          'firstname' => 'Insurance',
          'lastname' => 'Company',
          'company_id' => '3',
          'email' => 'incompanies@gmail.com',
          'password' => bcrypt('incompanies@gmail.com'),
          'role' => 'incompanies',
      ]);
      DB::table('users')->insert([
          'name' => 'Car Rental Employees',
          'firstname' => 'Car Rental',
          'lastname' => 'Employees',
          'company_id' => '4',
          'email' => 'cremployees@gmail.com',
          'password' => bcrypt('cremployees@gmail.com'),
          'role' => 'cremployees',
      ]);
    }
}
