<?php

namespace App\Services\Constructors;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface MessageConstructor
{
    /**
     * Get all messages
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection;

    /**
     * Send message
     *
     * @param MessageRequest $request
     * @return MessageResource
     */
    public function store(MessageRequest $request) : MessageResource;
}
