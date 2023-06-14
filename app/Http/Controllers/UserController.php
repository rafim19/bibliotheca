<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        // loginId pasti ada karena sudah divalidasi middleware
        $user = User::where('nim', $request->session()->get('loginId'))->first();
        $isEmpty = $user == null;
        // dd(Carbon::now()->toDateString());
        if ($isEmpty) {
            return back()->withErrors(['userNotFound' => 'User not found']);
        }

        $inProgressBooks = BorrowedBook::with('book')->where([
            ['user_id', $user->nim],
            ['due_date', '>', Carbon::now()->toDateString()]
        ])->paginate(5);
        $finishedBooks = BorrowedBook::with('book')->where([
            ['user_id', $user->nim],
            ['due_date', '<=', Carbon::now()->toDateString()]
        ])->paginate(5);

        // foreach ($inProgressBooks as $inProgress) {
        //     $inProgress->borrowedDate = 
        // }

        return view('profile', [
            'user' => $user,
            'inProgressBooks' => $inProgressBooks,
            'finishedBooks' => $finishedBooks
        ]);
    }
}
