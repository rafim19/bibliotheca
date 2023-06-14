<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class NotificationController extends Controller
{
    public function index(Request $request) {
        $notifications = Notification::where('user_id', $request->session()->get('loginId'))
                        ->orderBy('is_read')
                        ->get();
        $isEmpty = count($notifications) == 0;

        return view('notifications', ['notifications' => $notifications, 'isEmpty' => $isEmpty, 'routeName' => Route::currentRouteName()]);
    }

    public function readMiddle(Request $request, $id) {
        $notification = Notification::where('id', $id)->first();
        $isEmpty = $notification == null;

        if ($isEmpty) {
            return [
                'code' => 400,
                'title' => 'Notification not found',
                'message' => 'Cannot mark as read this notification'
            ];
        }

        if ($notification->is_read == 1) {
            return null;
        }

        Http::get(URL::to('/api/read-notif/'.$id));
    }

    public function read(Request $request, $id) {
        $markAsRead = Notification::where('id', $id)->update(['is_read' => 1]);
        
        if ($markAsRead == 0 || $markAsRead == null) {
            return [
                'code' => 500,
                'title' => 'Cannot mark as read this notification',
            ];
        }

        return response()->json([
            'code' => 200,
            'title' => 'Mark as read successful',
        ]);
    }
}
