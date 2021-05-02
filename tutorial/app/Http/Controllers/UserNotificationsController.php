<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show(){
        $notifications = auth()->user()->unreadNotifications;

//        foreach ($notifications as $notification){
//            $notification->markAsRead();
//        }

        $notifications->markAsRead();

        return view('notifications.show', [
            'notifications' => $notifications
        ]);

//        return view('notifications.show', [
//            'notifications' => tap(auth()->user()->unreadNotifications->markAsRead())
//        ]);
    }


}
