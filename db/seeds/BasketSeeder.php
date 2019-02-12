<?php

use Phinx\Seed\AbstractSeed;

class BasketSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UserSeeder',
            'ProductSeeder'
        ];
    }
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
                'user_id'    => rand(1, 5),
                'product_id' => rand(1, 5),
                'quantity'   => rand(1, 5),
                'created'    => date('Y-m-d H:i:s'),
                'updated'    => date('Y-m-d H:i:s')
            ];
        }
        $this->insert('basket', $data);
    }
}
