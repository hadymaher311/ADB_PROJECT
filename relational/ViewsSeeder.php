<?php


class ViewsSeeder
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
        // $records = "";
        // $user_id = $this->_db->getLastID('users')[0]->id;
        // for ($i = 0; $i < $seeds; $i++) {
        //         $records .=
        //             $this->_faker->ipv4 . ',' .
        //             $this->_faker->numberBetween(1, $user_id) . ',' .
        //             Carbon\Carbon::now()->toDateString() . ',' .
        //             Carbon\Carbon::now()->toDateString() . "\n";
        // }
        // file_put_contents("views.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'views.csv' INTO TABLE views FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (ip, user_id, created_at, updated_at);");
        $stmt->execute();
    }
}
