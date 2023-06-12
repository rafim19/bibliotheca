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
            Notification::insert([
                [
                    'title' => 'NEW BOOK BORROWED!',
                    'description' => 'You have borrowed a book named “Harry Potter and The Sorcerer’s Stone”! Please return it before the due date!',
                    'is_read' => false,
                    'user_id' => '2443193872',
                ],
                [
                    'title' => 'YOUR BIBLIOTHECA IS ACTIVATED!',
                    'description' => 'Hello and welcome to Bibliotheca, where you can explore books and borrowed it! This platform is provided for Binusian only!',
                    'is_read' => false,
                    'user_id' => '2443193872',
                ]
            ]);

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
