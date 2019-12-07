<?php


class AdminsSeeder
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
            $this->_db->insert('admins', [
                'name' => $this->_faker->name,
                'email' => $this->_faker->unique()->email,
                'phone' => $this->_faker->e164PhoneNumber,
                'status' => $this->_faker->randomDigit % 2,
                'password' => password_hash($this->_faker->word, PASSWORD_DEFAULT),
                'created_at' => Carbon\Carbon::now()->toDateString(),
                'updated_at' => Carbon\Carbon::now()->toDateString(),
            ]);
        }
    }
}
