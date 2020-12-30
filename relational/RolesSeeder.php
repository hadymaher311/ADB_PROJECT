<?php


class RolesSeeder
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
        // for ($i = 0; $i < $seeds; $i++) {
        //     $records .=
        //         $this->_faker->word . ',' .
        //         Carbon\Carbon::now()->toDateString() . ',' .
        //         Carbon\Carbon::now()->toDateString() . "\n";
        // }
        // file_put_contents("roles.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'roles.csv' INTO TABLE roles FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (name, created_at, updated_at);");
        $stmt->execute();
    }
}
