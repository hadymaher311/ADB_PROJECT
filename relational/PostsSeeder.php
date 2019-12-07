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

    public function seed($seeds = 1)
    {
        for ($i = 0; $i < $seeds; $i++) {
            $this->_db->insert('posts', [
                'title' => $this->_faker->word,
                'subtitle' => $this->_faker->word,
                'slug' => $this->_faker->slug,
                'body' => $this->_faker->text,
                'status' => $this->_faker->randomDigit % 2,
                'image' => $this->_faker->imageUrl(),
                'posted_by' => $this->_faker->numberBetween(1, $this->_db->getLastID('users')[0]->id),
                'created_at' => Carbon\Carbon::now()->toDateString(),
                'updated_at' => Carbon\Carbon::now()->toDateString(),
            ]);
        }
    }
}
