<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'created_at' => Time::now('Asia/Jakarta', 'id_ID'),
                'updated_at' => Time::now('Asia/Jakarta', 'id_ID')
            ];

            $this->db->table('orang')->insert($data);
        }

        // $data = [
        //     [
        //         'nama'      => 'Riza Syaihikma Rifai',
        //         'alamat'    => 'Jalan Raya Serang RT 03 RW 01 Desa Serang Kec Petarukan',
        //         'created_at' => Time::now('Asia/Jakarta'),
        //         'updated_at' => Time::now('Asia/Jakarta')
        //     ],
        //     [
        //         'nama'      => 'Alfin Qurtaain Firdaus',
        //         'alamat'    => 'Jalan Apa Wanarejan Utara Kec Taman',
        //         'created_at' => Time::now('Asia/Jakarta'),
        //         'updated_at' => Time::now('Asia/Jakarta')
        //     ]
        // ];

        // Simple Queries
        // $this->db->query("INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // foreach ($data as $d) {
        //    $this->db->table('orang')->insert($d);
        // }
        // $this->db->table('orang')->insertBatch($data);
    }
}
