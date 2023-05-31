<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
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
            BookCategory::insert([
                [
                    'name' => 'Mathematics',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'Programming',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'Statistics',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'Other',
                    'created_at' => Carbon::now()->toDateTimeString()
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
