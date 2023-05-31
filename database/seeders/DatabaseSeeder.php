<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserSeeder();
        $bookCategories = new BookCategorySeeder();
        $books = new BookSeeder();
        $borrowedBooks = new BorrowedBookSeeder();
        // $notifications = new NotificationSeeder();

        $user->run();
        $bookCategories->run();
        $books->run();
        $borrowedBooks->run();
        // $notifications->run();
    }
}
