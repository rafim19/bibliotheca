<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function processBooks($books) {
        foreach ($books as $book) {
            $oldTitle = explode(" ", $book->title);
            $newTitle = "";
            $charLimit = 44;
            $currentLen = 0;
            $isAllWord = true;

            foreach ($oldTitle as $word) {
                $tempTitle = $currentLen == 0 ? $word : $newTitle." ".$word;
                $lenTempTitle = strlen($tempTitle);
                $currentLen = $lenTempTitle;

                if ($currentLen >= $charLimit) {
                    $isAllWord = false;
                    break;
                }

                $newTitle = $tempTitle;
            }

            $newTitle = $isAllWord == false ? $newTitle."..." : $newTitle;
            $book->title = $newTitle;
            $book->description = nl2br($book->description);
        }
        return $books;
    }

    public function showByCategory(Request $request, $categoryId = null) {
        if ($categoryId == null) {
            $books = Book::orderBy('borrowed_count', 'desc')->limit(5)->get();
        } else {
            $books = Book::where('category_id', $categoryId)->get();
        }
        $books = $this->processBooks($books);
        return view('home', ['books' => $books, 'categoryId' => $categoryId, 'request' => $request]);
    }


}
