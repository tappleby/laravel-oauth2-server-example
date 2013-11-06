<?php
/*
 * User: tappleby
 * Date: 11/5/2013
 * Time: 10:02 PM
 */

class UserTableSeeder extends \Illuminate\Database\Seeder {

	public function run()
	{
		User::truncate();



		$data = json_decode(file_get_contents('http://api.randomuser.me/?results=3&seed=fizzbin140'));

		$users = array();

		foreach($data->results as $u) {
			$createMeta = array(
				'email' => $u->user->email,
				'password' => Hash::make($u->user->password),
				'first_name' => $u->user->name->first,
				'last_name' => $u->user->name->last,
				'password_raw' => $u->user->password,
				'picture' => $u->user->picture
			);


			$users[] = $createMeta;

		}

		array_map(array('User', 'create'), $users);
	}

}