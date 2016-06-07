<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 21/08/2015
 * Time: 15:50
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{


    public function run()
    {

        DB::table('users')->truncate();



      /*
       *
       *
       $faker = Faker::create();

        User::create([
            'name'=> 'Mikaell Araujo',
            'email'=> 'mikaell.7w7@gmail.com',
            'password'=> Hash::make('fran2505')
        ]);
       *
       foreach(range(1,10) as $i){

            User::create([
                'name'=> $faker->name(),
                'email'=> $faker->email(),
                'password'=> Hash::make($faker->word())
            ]);

        }
       *
       * Substituido pela chamada abaixo
       */

        factory('CodeCommerce\User')->create(
            [
                'name'=> 'Mikaell Araujo',
                'email'=> 'mikaell.7w7@gmail.com',
                'password'=> Hash::make('fran2505')
            ]
        );
        factory('CodeCommerce\User',10)->create();




    }

}