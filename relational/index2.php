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
define('DB_NAME', 'ADB_Without_opt');
define('DB_USER_NAME', 'root');
define('DB_PASSWORD', '');

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER_NAME, DB_PASSWORD, array(
    PDO::MYSQL_ATTR_LOCAL_INFILE => true,
));

$start = microtime(true);
echo "usersSeeder\n";
$usersSeeder = new UsersSeeder;
$usersSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "adminsSeeder\n";
$AdminsSeeder = new AdminsSeeder;
$AdminsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "CategoriesSeeder\n";
$CategoriesSeeder = new CategoriesSeeder;
$CategoriesSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "PostsSeeder\n";
$PostsSeeder = new PostsSeeder;
$PostsSeeder->seed($pdo, 10000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "RolesSeeder\n";
$RolesSeeder = new RolesSeeder;
$RolesSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "LikesSeeder\n";
$LikesSeeder = new LikesSeeder;
$LikesSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "AdminRolesSeeder\n";
$AdminRolesSeeder = new AdminRolesSeeder;
$AdminRolesSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "CategoryPostsSeeder\n";
$CategoryPostsSeeder = new CategoryPostsSeeder;
$CategoryPostsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "CommentsSeeder\n";
$CommentsSeeder = new CommentsSeeder;
$CommentsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "TagsSeeder\n";
$TagsSeeder = new TagsSeeder;
$TagsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "PostTagsSeeder\n";
$PostTagsSeeder = new PostTagsSeeder;
$PostTagsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";
$start = microtime(true);
echo "ViewsSeeder\n";
$ViewsSeeder = new ViewsSeeder;
$ViewsSeeder->seed($pdo, 1000000);
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "\n";

