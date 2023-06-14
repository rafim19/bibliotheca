<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
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
