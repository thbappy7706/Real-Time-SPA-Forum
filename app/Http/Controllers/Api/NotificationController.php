<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    public function __invoke(Request $request)
    {
        return [
            'read'=> DB::table('notifications')->whereNotNull('read_at')->get(),
            'unread'=>DB::table('notifications')->whereNull('read_at')->get(),
            'unreadCount'=> DB::table('notifications')->whereNull('read_at')->count(),
        ];
    }
}
