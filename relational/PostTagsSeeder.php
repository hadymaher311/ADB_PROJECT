<?php


class PostTagsSeeder
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
        $tag_id = $this->_db->getLastID('tags')[0]->id;
        $post_id = $this->_db->getLastID('posts')[0]->id;
        for ($i = 0; $i < $seeds; $i++) {
            $records .=
                $this->_faker->numberBetween(1, $tag_id) . ',' .
                $this->_faker->numberBetween(1, $post_id) . ',' .
                Carbon\Carbon::now()->toDateString() . ',' .
                Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("post_tags.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'post_tags.csv' INTO TABLE post_tags FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (tag_id, post_id, created_at, updated_at);");
        $stmt->execute();
    }
}
