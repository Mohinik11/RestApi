<?php

use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
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
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'price'      => rand(10, 99),
                'name'       => "Product$i",
                'created'    => date('Y-m-d H:i:s'),
                'updated'    => date('Y-m-d H:i:s')
            ];
        }
        $this->insert('products', $data);
    }
}
