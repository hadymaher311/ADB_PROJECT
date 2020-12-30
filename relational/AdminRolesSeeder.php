<?php


class AdminRolesSeeder
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
        // $admin_id = $this->_db->getLastID('admins')[0]->id;
        // $role_id = $this->_db->getLastID('roles')[0]->id;
        // for ($i = 0; $i < $seeds; $i++) {
        //         $records .= 
        //             $this->_faker->numberBetween(1, $admin_id). ',' .
        //             $this->_faker->numberBetween(1, $role_id). ',' .
        //             Carbon\Carbon::now()->toDateString(). ',' .
        //             Carbon\Carbon::now()->toDateString(). "\n";
        // }
        // file_put_contents("admin_roles.csv", $records);
        $stmt = $pdo->prepare("LOAD DATA LOCAL INFILE 'admin_roles.csv' INTO TABLE admin_roles FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' (admin_id, role_id, created_at, updated_at);");
        $stmt->execute();
    }
}
