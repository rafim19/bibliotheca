<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class BookController extends Controller
{
    public function borrowMiddle(Request $request, $id) {
        if (!$id) {
            return response()->json([
                'code' => 400,
                'title' => 'Failed to borrow',
                'message' => 'book_id is not present'
            ]);
        }
        // dd($request->session()->get('loginId'));
        // Http::get(URL::to('/api/borrow/'.$id.'/'.$request->session()->get('loginId')));
        return response()->json($this->borrow($id, $request->session()->get('loginId')));
    }

    private function borrow($bookId, $userId) {
        // $userId = $request->session()->get('loginId');
        // dd('test');
        $startDate = Carbon::now();
        $endDate = $startDate->addDays(7);
        $book = Book::where('id', $bookId)->first();
        
        DB::beginTransaction();
        try {
            BorrowedBook::insert([
                'book_id' => $bookId,
                'user_id' => $userId,
                'borrowed_date' => $startDate->toDateTimeString(),
                'due_date' => $endDate->toDateTimeString(),
                'returned_date' => null,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
            Notification::insert([
                'title' => 'NEW BOOK BORROWED!',
                'description' => 'You have borrowed a book named '.'"'.$book->title.'"!'.' Please return it before the due date!',
                'is_read' => false,
                'user_id' => $userId,   
            ]);
            // dd([
            //     'code' => 200,
            //     'title' => 'Success',
            //     'message' => 'Success borrow book'
            // ]);
            DB::commit();
            return [
                'code' => 200,
                'title' => 'Success',
                'message' => 'Success borrow book'
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'code' => 500,
                'title' => 'Failed to borrow',
            ];
        }
    }
}
