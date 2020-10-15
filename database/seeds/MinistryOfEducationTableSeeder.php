<?php

use Illuminate\Database\Seeder;
use App\Models\MinistryOfEducation;

class MinistryOfEducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add sample data
        MinistryOfEducation::create([
            'schoolname' => 'kale-ab',
            'schooladdress' => 'sebeta',
            'schoolregion' => 'oromia',
            'schoolphone' => '0911113099',
            'schoolidentificationid' => 'kaleab-add',
        ]);

        MinistryOfEducation::create([
            'schoolname' => 'roge',
            'schooladdress' => 'sebeta',
            'schoolregion' => 'oromia',
            'schoolphone' => '0912121212',
            'schoolidentificationid' => 'roge-add',
        ]);
    }
}