<?php


class LikesSeeder
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
        $user_id = $this->_db->getLastID('users')[0]->id;
        $post_id = $this->_db->getLastID('posts')[0]->id;
        for ($i = 0; $i < $seeds; $i++) {
            $records .=
                $this->_faker->numberBetween(1, $user_id) . ',' .
                $this->_faker->numberBetween(1, $post_id) . ',' .
                Carbon\Carbon::now()->toDateString() . ',' .
                Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("likes.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'likes.csv' INTO TABLE likes FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (user_id, post_id, created_at, updated_at);");
        $stmt->execute();
    }
}
