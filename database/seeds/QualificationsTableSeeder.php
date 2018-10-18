<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert([
            'title' => 'Degree in Computing',
        ]);

        DB::table('qualifications')->insert([
            'title' => 'Degree in Marketing',
        ]);

        DB::table('qualifications')->insert([
            'title' => 'Degree in Accounting and Finance',
        ]);

        DB::table('qualifications')->insert([
            'title' => 'Masters in Architecture',
        ]);

        DB::table('qualifications')->insert([
            'title' => 'Masters in Business',
        ]);
    }
}
