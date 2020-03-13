<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Get user without yourself
     *
     * @return JsonResponse
     */
    public function getUsers()
    {
        $user = Auth::user();
        return response()->json([
            'object' => $user->getUsersList($user->id)
        ], 200);
    }

    /**
     * Get received messages
     *
     * @return JsonResponse
     */
    public function getInboxMessages()
    {
        $user = Auth::user();
        return response()->json([
            'object' => $user->getInbox()->get()
        ], 200);
    }

    /**
     * Get received message from user
     *
     * @param int $userId
     * @return JsonResponse
     */
    public function getMessageFromUser(int $userId)
    {
        $user = Auth::user();
        return response()->json([
            'object' => $user->getInbox()->where('from_user_id', $userId)->get()
        ], 200);
    }
}
