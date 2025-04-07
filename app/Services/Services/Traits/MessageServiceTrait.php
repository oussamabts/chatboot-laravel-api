<?php

namespace App\Services\Services\Traits;

use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

trait MessageServiceTrait
{
    /**
     * Send message to nlp
     *
     * @param MessageRequest $request
     *
     * @return Response
     */
    private function nlp(MessageRequest $request) : Response
    {
        return Http::post('http://192.168.1.119:5000/nlp/asks', [
            'question' => $request->message,
        ]);
    }
}
