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

    public function seed($seeds = 1, $buckets = 1)
    {
        for ($i = 0; $i < $seeds; $i += $buckets) {
            $records = [];
            for ($j = 0; $j < $buckets; $j++) {
                $records[] = [
                    'admin_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('admins')[0]->id),
                    'role_id' => $this->_faker->numberBetween(1, $this->_db->getLastID('roles')[0]->id),
                    'created_at' => Carbon\Carbon::now()->toDateString(),
                    'updated_at' => Carbon\Carbon::now()->toDateString(),
                ];
            }
            $this->_db->insertMany('admin_roles', $records);
        }
    }
}
