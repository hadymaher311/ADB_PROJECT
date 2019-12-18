<?php


class AdminsSeeder
{
    protected $_db;
    protected $_faker;

    public function __construct()
    {
        $this->_faker = Faker\Factory::create();
    }

    public function seed($pdo, $seeds = 1)
    {
        $records = "";
        for ($i = 0; $i < $seeds; $i++) {
                $records .=
                    $this->_faker->name . ',' .
                    $this->_faker->unique()->email . ',' .
                    $this->_faker->e164PhoneNumber . ',' .
                    $this->_faker->randomDigit % 2 . ',' .
                    $this->_faker->password . ',' .
                    Carbon\Carbon::now()->toDateString() . ',' .
                    Carbon\Carbon::now()->toDateString() . "\n";
        }
        file_put_contents("admins.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'admins.csv' INTO TABLE admins FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (name, email, phone, status, password, created_at, updated_at);");
        $stmt->execute();
    }
}
