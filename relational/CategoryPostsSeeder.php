<?php


class CategoryPostsSeeder
{
    protected $_db;
    protected $_faker;

    public function __construct()
    {
        $this->_db = DB::getInstance();
        $this->_faker = Faker\Factory::create();
    }

    public function seed($pdo, $seeds = 1)
    {
        $records = "";
        $post_id = $this->_db->getLastID('posts')[0]->id;
        $category_id = $this->_db->getLastID('categories')[0]->id;
        for ($i = 0; $i < $seeds; $i++) {
            $records .=
                $this->_faker->numberBetween(1, $post_id) . ',' .
                $this->_faker->numberBetween(1, $category_id) . ',' .
                Carbon\Carbon::now()->toDateString() . ',' .
                Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("category_posts.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'category_posts.csv' INTO TABLE category_posts FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (post_id, category_id, created_at, updated_at);");
        $stmt->execute();
    }
}
