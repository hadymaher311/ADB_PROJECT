<?php


class CategoryPostsSeeder
{
    protected $_db;
    protected $_faker;

    public function __construct()
    {
        $this->_db = DB::getInstance();
        $this->_faker = Faker\Factory::create();
    }

    public function seed($seeds = 1)
    {
        for ($i = 0; $i < $seeds; $i++) {
            $this->_db->insert('category_posts', [
                'post_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('posts')[0]->id),
                'category_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('categories')[0]->id),
                'created_at' => Carbon\Carbon::now()->toDateString(),
                'updated_at' => Carbon\Carbon::now()->toDateString(),
            ]);
        }
    }
}
