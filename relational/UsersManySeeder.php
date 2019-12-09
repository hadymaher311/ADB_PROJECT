<?php


class UsersManySeeder
{
    protected $_db;
    protected $_faker;

    public function __construct()
    {
        $this->_db = DB::getInstance();
        $this->_faker = Faker\Factory::create();
    }

    public function seed($seeds = 1, $buckets = 1)
    {
        for ($i = 0; $i < $buckets; $i++) {
            $records[] = [
                'name' => $this->_faker->name,
                'email' => $this->_faker->unique()->email,
                'password' => password_hash($this->_faker->word, PASSWORD_DEFAULT),
                'created_at' => Carbon\Carbon::now()->toDateString(),
                'updated_at' => Carbon\Carbon::now()->toDateString(),
            ];
        }
        for ($i=0; $i < $seeds; $i += $buckets) { 
            $this->_db->insertMany('users', $records);
        }
    }
}
