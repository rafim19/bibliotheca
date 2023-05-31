<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            // Notification::insert([
            //     [
            //         'title' => '',
            //         'description' => '',
            //         'user_id' => '',
            //     ],
            //     [
            //         'title' => '',
            //         'description' => '',
            //         'user_id' => '',
            //     ]
            // ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            
            $file = $th->getFile();
            $line = $th->getLine();
            $message = $th->getMessage();
            echo $message.". In File: ".$file.". In Line: ".$line;
        }
    }
}
