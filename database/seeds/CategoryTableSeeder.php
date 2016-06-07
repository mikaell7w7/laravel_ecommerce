<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 21/08/2015
 * Time: 15:50
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder{


    public function run()
    {

        DB::table('categories')->truncate();

        /**
         *

        $faker = Faker::create();

        foreach(range(1,15) as $i){

            Category::create([
                'name'=> $faker->word(),
                'description'=> $faker->sentence()
            ]);

        }
         *
         * SUBSTITUIDO PELO COMANDO ABAIXO, USANDO FACTORIES E FAKER
         */

        factory('CodeCommerce\Category',15)->create();



    }

}