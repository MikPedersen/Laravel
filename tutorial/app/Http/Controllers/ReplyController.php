<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Reply $reply){
        // authorize that the user has permission to set best reply
        $this->authorize('update', $reply->conversation);

        //then set it
        $reply->conversation->best_reply_id = $reply->id;
        $reply->conversation->save();

        //redirect back to the conversations page
        return back();
    }
}
