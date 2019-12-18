<?php


class UsersSeeder
{
    // protected $_db;
    protected $_faker;

    public function __construct()
    {
        // $this->_db = DB::getInstance();
        $this->_faker = Faker\Factory::create();
    }

    public function seed($pdo, $seeds = 1)
    {
        $records = "";
        $password = password_hash('123456789', PASSWORD_DEFAULT);
        for ($i = 0; $i < $seeds; $i++) {
            $records .=
                $this->_faker->name . ',' .
                $this->_faker->unique()->email . ',' .
                $password . ',' .
                Carbon\Carbon::now()->toDateString() . ',' .
                Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("users.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'users.csv' INTO TABLE users FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (name, email, password, created_at, updated_at);");
        $stmt->execute();
    }
}
