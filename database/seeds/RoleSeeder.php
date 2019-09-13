<?php

use App\Category;
use App\Post;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     
      for ($i=0; $i <5 ; $i++) { 
       $cat  = Category::create([
          'name' => 'Dummy-'.$i,
          'slug' => 'dummy-'.$i,
          'image' => 'dummy.png',
          'status' => '1',
          'created_at' => now(),
        ]);

       $cat->category_parent()->attach(0);
      }

      for ($i=0; $i <5 ; $i++) { 
        Tag::create([
          'name' => 'Dummy-'.$i,
          'slug' => 'dummy-'.$i,
          'created_at' => now(),
        ]);
      }

     
      $admin = User::create([
        'name' => 'admin',
        'thumbnail' =>'dummy.png',
        'email' => 'admin@gmail.com',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim',
        'password' => bcrypt('secret'),
 

      ]);
        $role = Role::create([
        	'name' => 'admin',
        	'permissions' => json_encode(
              [
              	'create-user' => true,
              	'delete-user' => true,
              	'update-user' => true,
              	'view-user' => true,
              	'view-orders' => true,
              	'view-products' => true,
              	'view-category' =>true,
              	'create-product' => true,

                 'create-post' => true,

    
             'view-role' => true,
             'create-role' => true,
             'update-role' => true,
             'delete-role' => true,
             'assign-role' => true,
        


              ]


        	)



        ]);

       
    }
}
 