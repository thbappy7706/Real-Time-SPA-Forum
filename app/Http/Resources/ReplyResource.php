<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reply' => $this->body,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'question_slug' => $this->question->slug,
            'like_count' => $this->likes->count(),
            'liked' => !!$this->likes->where('user_id',Auth::id())->count(),
            'time' =>isset($this->created_at) ? $this->created_at->diffForHumans() : Carbon::now(),

        ];
    }
}
