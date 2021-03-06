<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'username'      => 'testUserName' . $i,
                'email'           => $faker->email,
                'created'      => date('Y-m-d H:i:s'),
                'updated'    => date('Y-m-d H:i:s')
            ];
        }
        $this->insert('users', $data);
    }
}
