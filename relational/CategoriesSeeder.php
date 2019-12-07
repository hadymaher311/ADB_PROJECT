<?php


class CategoriesSeeder
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
            $this->_db->insert('categories', [
                'name' => $this->_faker->word,
                'slug' => $this->_faker->slug,
                'created_at' => Carbon\Carbon::now()->toDateString(),
                'updated_at' => Carbon\Carbon::now()->toDateString(),
            ]);
        }
    }
}
