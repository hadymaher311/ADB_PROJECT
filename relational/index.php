<?php

// use DB;

# When installed via composer

// use UsersSeeder;

require_once 'vendor/autoload.php';
require_once 'DB.php';
require_once 'UsersSeeder.php';
require_once 'UsersManySeeder.php';
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
define('DB_NAME', 'blog2');
define('DB_USER_NAME', 'root');
define('DB_PASSWORD', '');

// $start = microtime(true);
// $usersSeeder = new UsersManySeeder;
// $usersSeeder->seed();
// $time_elapsed_secs = microtime(true) - $start;
// echo $time_elapsed_secs . '\n';

// $start = microtime(true);
echo 'usersSeeder\n<br>';
$usersSeeder = new UsersSeeder;
$usersSeeder->seed(1000000 / 4, 50);
// $time_elapsed_secs = microtime(true) - $start;
// echo $time_elapsed_secs . '\n';
echo 'adminsSeeder\n<br>';
$AdminsSeeder = new AdminsSeeder;
$AdminsSeeder->seed(1000000 / 3, 50);
echo 'CategoriesSeeder\n<br>';
$CategoriesSeeder = new CategoriesSeeder;
$CategoriesSeeder->seed(1000000 / 3, 50);
echo 'PostsSeeder\n<br>';
$PostsSeeder = new PostsSeeder;
$PostsSeeder->seed(1000000 / 3, 50);
echo 'RolesSeeder\n<br>';
$RolesSeeder = new RolesSeeder;
$RolesSeeder->seed(1000000 / 3, 50);
echo 'LikesSeeder\n<br>';
$LikesSeeder = new LikesSeeder;
$LikesSeeder->seed(1000000 / 3, 50);
echo 'AdminRolesSeeder\n<br>';
$AdminRolesSeeder = new AdminRolesSeeder;
$AdminRolesSeeder->seed(1000000 / 3, 50);
echo 'CategoryPostsSeeder\n<br>';
$CategoryPostsSeeder = new CategoryPostsSeeder;
$CategoryPostsSeeder->seed(1000000 / 3, 50);
echo 'CommentsSeeder\n<br>';
$CommentsSeeder = new CommentsSeeder;
$CommentsSeeder->seed(1000000 / 3, 50);
echo 'TagsSeeder\n<br>';
$TagsSeeder = new TagsSeeder;
$TagsSeeder->seed(1000000 / 3, 50);
echo 'PostTagsSeeder\n<br>';
$PostTagsSeeder = new PostTagsSeeder;
$PostTagsSeeder->seed(1000000 / 3, 50);
echo 'ViewsSeeder\n<br>';
$ViewsSeeder = new ViewsSeeder;
$ViewsSeeder->seed(1000000 / 3, 50);

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