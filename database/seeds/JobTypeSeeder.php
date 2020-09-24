<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTypes = [
            'accounting' => '',
            'architecture' => 'Architecture Jobs',
            'design' => 'Design, Creative, and Arts Jobs',
            'human_resources' => 'Human Resources and Recruitment Jobs',
            'civil_engineer' => 'Civil Engineer',
            'education' => 'Education',
            'marketing' => 'Marketing',
            'software_engineer' => 'Software Engineer',
            'reception' => 'Reception',
            'oil_engineer' => 'Oil Engineer',
            'sales' => 'Sales',
            'security' => 'Security'
        ];

        // add every new job type in the jobTypes array


        collect(array_keys($jobTypes))
            ->each(function ($job) {
                DB::table('job_types')->insert([
                    'name' => $job
                ]);
            });
    }
}
