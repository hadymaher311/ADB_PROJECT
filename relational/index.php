<?php

// use DB;

# When installed via composer

// use UsersSeeder;

require_once 'vendor/autoload.php';
require_once 'DB.php';
require_once 'UsersSeeder.php';
require_once 'AdminsSeeder.php';
require_once 'CategoriesSeeder.php';
require_once 'PostsSeeder.php';
require_once 'AdminRolesSeeder.php';
require_once 'CategoryPostsSeeder.php';
require_once 'CommentsSeeder.php';
require_once 'LikesSeeder.php';
require_once 'PostTagsSeeder.php';
require_once 'RolesSeeder.php';
require_once 'TagsSeeder.php';
require_once 'ViewsSeeder.php';

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'blog');
define('DB_USER_NAME', 'root');
define('DB_PASSWORD', '');

$usersSeeder = new UsersSeeder;
$usersSeeder->seed(1000000);
$AdminsSeeder = new AdminsSeeder;
$AdminsSeeder->seed(1000000);
$CategoriesSeeder = new CategoriesSeeder;
$CategoriesSeeder->seed(1000000);
$PostsSeeder = new PostsSeeder;
$PostsSeeder->seed(1000000);
$RolesSeeder = new RolesSeeder;
$RolesSeeder->seed(1000000);
$LikesSeeder = new LikesSeeder;
$LikesSeeder->seed(1000000);
$AdminRolesSeeder = new AdminRolesSeeder;
$AdminRolesSeeder->seed(1000000);
$CategoryPostsSeeder = new CategoryPostsSeeder;
$CategoryPostsSeeder->seed(1000000);
$CommentsSeeder = new CommentsSeeder;
$CommentsSeeder->seed(1000000);
$TagsSeeder = new TagsSeeder;
$TagsSeeder->seed(1000000);
$PostTagsSeeder = new PostTagsSeeder;
$PostTagsSeeder->seed(1000000);
$ViewsSeeder = new ViewsSeeder;
$ViewsSeeder->seed(1000000);

// use the factory to create a Faker\Generator instance
// $faker = Faker\Factory::create();

// $db = DB::getInstance();
// var_dump($db->getLastID('users')[0]->id);

// // generate data by accessing properties
// echo $faker->name;

// echo '<br>';

// echo $faker->address;
// echo '<br>';
// // "426 Jordy Lodge
// // Cartwrightshire, SC 88120-6700"
// echo $faker->text;
// echo '<br>';