<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function create(SubscriberRequest $request)
    {
        $validated = $request->validated();
        $subscriber = Subscriber::create($validated);

        return response()->json([
            "message" => "Thank you! You are now subscribed, you will be noticed once a blog post is publised."
        ], 201);
    }

    public function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', '=', $email);
        $subscriber->delete();
        return response()->json([
            "message" => "Unsubscribe success. You will not receive any of these emails anymore."
        ], 201)->header('Content-Type', 'application/json');
    }
}
