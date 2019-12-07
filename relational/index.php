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
$usersSeeder->seed(10);
$AdminsSeeder = new AdminsSeeder;
$AdminsSeeder->seed(10);
$CategoriesSeeder = new CategoriesSeeder;
$CategoriesSeeder->seed(10);
$PostsSeeder = new PostsSeeder;
$PostsSeeder->seed(10);
$RolesSeeder = new RolesSeeder;
$RolesSeeder->seed(10);
$LikesSeeder = new LikesSeeder;
$LikesSeeder->seed(10);
$AdminRolesSeeder = new AdminRolesSeeder;
$AdminRolesSeeder->seed(10);
$CategoryPostsSeeder = new CategoryPostsSeeder;
$CategoryPostsSeeder->seed(10);
$CommentsSeeder = new CommentsSeeder;
$CommentsSeeder->seed(10);
$TagsSeeder = new TagsSeeder;
$TagsSeeder->seed(10);
$PostTagsSeeder = new PostTagsSeeder;
$PostTagsSeeder->seed(10);
$ViewsSeeder = new ViewsSeeder;
$ViewsSeeder->seed(10);

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