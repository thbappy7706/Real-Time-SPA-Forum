<?php

namespace App\Http\Controllers\Api;

use App\Events\LikeEvent;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Reply $reply): \Illuminate\Http\Response
    {
       $reply = $reply->likes()->create([
           'user_id' => auth()->id(),
       ]) ;
       broadcast(new LikeEvent($reply->id, 1))->toOthers();
       if ($reply)
       {
           return response('Liked', Response::HTTP_CREATED);
       }else{
           return response("Failed", Response::HTTP_FAILED_DEPENDENCY);
       }
    }

    public function unLikeIt(Reply $reply)
    {
        $like = $reply->likes()->where('user_id',Auth::id())->first()->delete();
        broadcast(new LikeEvent($reply->id, 0))->toOthers();
        if ($like){
            return response("Deleted", Response::HTTP_NO_CONTENT);
        }
    }


}
