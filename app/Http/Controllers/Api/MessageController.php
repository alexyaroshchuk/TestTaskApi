<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MessageFormRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * User send message
     * @param MessageFormRequest $request
     * @return JsonResponse
     */
    public function store(MessageFormRequest $request)
    {
        $authUserId = Auth::user()->id;
        $toUserId = User::getUserByEmail($request->email)->id;
        $message = new Message();
        return response()->json([
            'object' => $message->storeMessage($authUserId, $toUserId, $request->message)
        ], 200);
    }

}
