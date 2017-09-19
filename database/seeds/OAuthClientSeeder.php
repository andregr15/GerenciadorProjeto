<?php

use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->delete();
        DB::table('oauth_clients')->insert([
            'name'=>'codeEducation',
            'secret'=>'zD5TAO4Du7D152NeVLONYQtWDojadzRxca40jKpQ',
            'redirect'=>'http://localhost:8000',
            'personal_access_client'=>false,
            'password_client'=>true,
            'revoked'=>false,
        ]);
    }
}
