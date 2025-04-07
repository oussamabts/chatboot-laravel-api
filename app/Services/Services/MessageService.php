<?php

namespace App\Services\Services;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\Constructors\MessageConstructor;
use Illuminate\Support\Facades\Http;
use App\Models\Message;
use App\Services\Services\Traits\MessageServiceTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MessageService implements MessageConstructor
{
    public function index(): AnonymousResourceCollection
    {
        return MessageResource::collection(
            Message::where('user_id', Auth::user()->id)->get()
        );
    }
    /**
     * MessageService Trait
     */
    use MessageServiceTrait;

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

    /**
     * destroy a message
     *
     * @param Message $message
     * @return boolean
     */
    public function destroy(Message $message): bool
    {
        return Auth::user()->messages()->where('id', $message->id)->delete();
    }
}
