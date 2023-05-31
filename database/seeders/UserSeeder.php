<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
            User::insert([
                [
                    'nim' => '2443193872',
                    'name' => 'Henry Cavill',
                    'email' => 'henrycavill@binus.ac.id',
                    'gender' => 'Male',
                    'domicile' => 'Jakarta',
                    'phone_number' => '081292122421',
                    'faculty' => 'Computer Science',
                    'major' => 'Cyber Security',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'nim' => '2443193081',
                    'name' => 'Corey Mylchreest',
                    'email' => 'corey@binus.ac.id',
                    'gender' => 'Male',
                    'domicile' => 'Jakarta',
                    'phone_number' => '085792122421',
                    'faculty' => 'Computer Science',
                    'major' => 'Computer Science',
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
