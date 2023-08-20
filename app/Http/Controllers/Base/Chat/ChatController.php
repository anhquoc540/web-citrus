<?php

namespace App\Http\Controllers\Base\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    //
    public function messages()
    {
        return Message::with('user')->get();
    }

    public function messageStore(Request $request)
    {
        $user = Auth::user();

        $messages = $user->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new SendMessage($user, $messages))->toOthers();

        return $this->sendSuccessData($messages, "success");
    }
}
