<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 21/08/2015
 * Time: 15:50
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{


    public function run()
    {

        DB::table('products')->truncate();

           factory('CodeCommerce\Product',40)->create();



    }

}