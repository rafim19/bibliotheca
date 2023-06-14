<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        ])->paginate(3);
        $finishedBooks = BorrowedBook::with('book')->where([
            ['user_id', $user->nim],
            ['due_date', '<=', Carbon::now()->toDateString()]
        ])->paginate(3);

        // foreach ($inProgressBooks as $inProgress) {
        //     $inProgress->borrowedDate = 
        // }

        return view('profile', [
            'user' => $user,
            'inProgressBooks' => $inProgressBooks,
            'finishedBooks' => $finishedBooks,
            'routeName' => Route::currentRouteName()
        ]);
    }
}
