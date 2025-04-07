<?php

namespace App\Services\Services;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\Constructors\MessageConstructor;
use Illuminate\Support\Facades\Http;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageService implements MessageConstructor
{
    /**
     * Send message
     *
     * @param MessageRequest $request
     * @return MessageResource
     */
    public function store(MessageRequest $request): MessageResource
    {

        $response = $this->nlp($request);

        return MessageResource::make(
            Message::create(array_merge(
                $request->validated(),
                [
                    'user_id' => Auth::user()->id,
                    'response' => $response['answer']
                ]
            ))
        );
    }

    private function nlp(MessageRequest $request)
    {
        return Http::post('http://192.168.1.119:5000/nlp/asks', [
            'question' => $request->message,
        ]);
    }
}
