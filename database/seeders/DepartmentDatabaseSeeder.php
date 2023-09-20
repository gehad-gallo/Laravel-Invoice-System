<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::setMany([
            'sales',
            'support',
            'translatable' => [
               'en' => 'بائع',
                'ar' => 'دعم',
            ],
        ]);
    }
}
