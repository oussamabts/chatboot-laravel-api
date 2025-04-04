<?php

namespace App\Services\Constructors;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;

interface MessageConstructor
{
    /**
     * Send message
     *
     * @param MessageRequest $request
     * @return MessageResource
     */
    public function store(MessageRequest $request) : MessageResource;
}
