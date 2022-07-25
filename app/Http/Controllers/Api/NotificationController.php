<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    public function getNotifications(): array
    {
        $read = DB::table('notifications')->whereNotNull('read_at')->get();
        $unread = DB::table('notifications')->whereNull('read_at')->get();
        return [
            'read'=>NotificationResource::collection($read),
            'unread'=>NotificationResource::collection($unread),
            'unreadCount'=> DB::table('notifications')->whereNull('read_at')->count(),
        ];
    }

    public function readNotification($id)
    {
        return DB::table('notifications')->where('id',$id)->update(['read_at'=>now()]);
    }
}
