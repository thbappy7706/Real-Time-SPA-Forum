<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __invoke(Request $request)
    {
        return [
            'read'=> auth()->user()->readNotifications(),
            'unread'=> auth()->user()->unreadNotifications(),
        ];
    }
}
