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

    public function seed($seeds = 1, $buckets = 1)
    {
        for ($i = 0; $i < $seeds; $i+=$buckets) {
            $records = [];
            for ($j = 0; $j < $buckets; $j++) {
                $records[] = [
                    'user_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('users')[0]->id),
                    'post_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('posts')[0]->id),
                    'created_at' => Carbon\Carbon::now()->toDateString(),
                    'updated_at' => Carbon\Carbon::now()->toDateString(),
                ];
            }
            $this->_db->insertMany('likes', $records);
        }
    }
}
