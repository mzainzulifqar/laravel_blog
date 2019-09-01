<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$permissions = [

    		['name' => 'create-user'],
    		['name' => 'delete-user'],
    		['name' => 'update-user'],
    		['name' => 'view-user' ],


            // dropdown view permissions
            
            ['name' => 'view-essentials'],



            // dropdown end here
            
    		['name' => 'view-orders'],

    		['name' => 'view-products'],
    		['name' =>'create-product'],

    		['name' => 'create-post'],

    
            ['name' => 'view-role'],
            ['name' => 'create-role'],
            ['name' => 'update-role'],
            ['name' => 'delete-role'],
            ['name' => 'assign-role'],

            ['name' => 'view-permission'],
            ['name' => 'create-permission'],
            ['name' => 'update-permission'],
            ['name' => 'delete-permission'],

            ['name' => 'view-category'],
            ['name' => 'create-category'],
            ['name' => 'update-category'],
            ['name' => 'delete-category'],
            

            ['name' => 'view-tag'],
            ['name' => 'create-tag'],
            ['name' => 'update-tag'],
            ['name' => 'delete-tag'],
    		


    	];

    	DB::table('permissions')->insert($permissions);
       
    }
}
