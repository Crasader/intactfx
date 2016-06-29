<?php

use Illuminate\Database\Seeder;

class IntactUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('intact_users')->delete();
        
        \DB::table('intact_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mark Anthony Tableza',
                'email' => 'tablezsdamark@yahoo.com',
                'password' => '$2y$10$vhm1L1bX2QTjXNMI9AXtROUubO/CWYDpnefv.MTwmvJAeeIxR2h4q',
                'password_text' => '',
                'activated' => 1,
                'account_stat' => '1',
                'token' => '9JMNO2pQfrUwY8calybfqjOFwpr7cb',
                'affiliate_id' => NULL,
                'remember_token' => '7auocamvT2KkY2pRkwE0Mr57MIJMAApCPQKd3F7sjh52X38kDcQTD5vKb5RJ',
                'created_at' => '2016-06-27 14:13:55',
                'updated_at' => '2016-06-27 14:14:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mark Anthony Tableza',
                'email' => 'tablsdsezamark@yahoo.com',
                'password' => '$2y$10$7O.o7bW7vNAxiStStq1h2Ok8mdkfm3qL6GEzprWkkGZ4M9Cb6Rij6',
                'password_text' => '',
                'activated' => 1,
                'account_stat' => '1',
                'token' => 'IWaU2deyUXNU0nknafDRSI3YpbYKHa',
                'affiliate_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2016-06-27 14:15:13',
                'updated_at' => '2016-06-27 14:15:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mark Anthony Tableza',
                'email' => 'tablezsdfamark@yahoo.com',
                'password' => '$2y$10$ULSFs1w8eayqkxYX9OIBPekKDQLma1xtxiXT7/h4B5XmoLL2YE5Zi',
                'password_text' => '',
                'activated' => 1,
                'account_stat' => '1',
                'token' => 'Rjzxjpr23BEGouXjwtCxsxKjtZUFB4',
                'affiliate_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2016-06-27 14:15:50',
                'updated_at' => '2016-06-27 14:15:50',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Mark Anthony Tableza',
                'email' => 'tablezamdfsdsark@yahoo.com',
                'password' => '$2y$10$jzTXNNfmKH4FPIowvDAiNOVxawaQtEkmcA6bU5fAHuxc5qUunIDpu',
                'password_text' => '',
                'activated' => 1,
                'account_stat' => '1',
                'token' => 'q6cy2ng3Q0F1j0b21j4kNEtQt1ftRZ',
                'affiliate_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2016-06-27 14:16:25',
                'updated_at' => '2016-06-27 14:16:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '',
                'email' => 'tablezamark@yahoo.com',
                'password' => '$2y$10$dC26gmkXZ6gYomzk1Dikw.ZgJUNwZqRG8WI.lTFt8/vl8NamPfYhK',
                'password_text' => '',
                'activated' => 1,
                'account_stat' => '1',
                'token' => '9yJYePBlcfRCbQ7gAOKMhm8QtnhD9w',
                'affiliate_id' => NULL,
                'remember_token' => 'AAgv1h9MS4AFaIPuYcplSCSIQ0PeUEkd26TUGLs8cDwMakeLCqiFK1FApL4i',
                'created_at' => '2016-06-27 14:18:05',
                'updated_at' => '2016-06-28 01:01:53',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '',
                'email' => 'asdf@gmail.com',
                'password' => '$2y$10$EnxPfYmeuMh7PijhT4ERpO1.gWPa0bggCE1DVlkjgJPqYNeTeRk/m',
                'password_text' => 'asdfasdf',
                'activated' => 0,
                'account_stat' => '1',
                'token' => 'KHLAWXj3iVaC2FRsbi2Lt7XVoXQ0tI',
                'affiliate_id' => '',
                'remember_token' => NULL,
                'created_at' => '2016-06-28 01:02:51',
                'updated_at' => '2016-06-28 01:02:51',
            ),
        ));
        
        
    }
}
