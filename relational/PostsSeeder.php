<?php


class PostsSeeder
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
        for ($i = 0; $i < $seeds; $i++) {
            $records .=
                $this->_faker->word . ',' .
                $this->_faker->word . ',' .
                $this->_faker->slug . ',' .
                $this->_faker->text . ',' .
                $this->_faker->randomDigit % 2 . ',' .
                $this->_faker->imageUrl() . ',' .
                $this->_faker->numberBetween(1, $user_id) . ',' .
                Carbon\Carbon::now()->toDateString() . ',' .
                Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("posts.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'posts.csv' INTO TABLE posts FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (title, subtitle, slug, body, status, image, posted_by, created_at, updated_at);");
        $stmt->execute();
    }
}
