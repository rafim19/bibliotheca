<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\BorrowedBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowedBookSeeder extends Seeder
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
            BorrowedBook::insert([
                [
                    'book_id' => 1,
                    'user_id' => '2443193872',
                    'borrowed_date' => '2023-05-23',
                    'due_date' => '2023-06-23',
                    'returned_date' => null,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'book_id' => 2,
                    'user_id' => '2443193872',
                    'borrowed_date' => '2023-05-17',
                    'due_date' => '2023-06-17',
                    'returned_date' => null,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'book_id' => 5,
                    'user_id' => '2443193872',
                    'borrowed_date' => '2023-01-23',
                    'due_date' => '2023-02-24',
                    'returned_date' => '2023-02-15',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'book_id' => 6,
                    'user_id' => '2443193081',
                    'borrowed_date' => '2023-06-01',
                    'due_date' => '2023-07-01',
                    'returned_date' => null,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
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
