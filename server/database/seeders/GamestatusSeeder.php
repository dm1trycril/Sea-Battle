<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamestatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['awaiting', 'preparing', 'game', 'pause', 'ending'];
        foreach ($statuses as $status) {
            DB::table('gamestatuses')->insert([
                'status_name' => $status
            ]);
        };
    }
}
