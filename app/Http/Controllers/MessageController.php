<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\Constructors\MessageConstructor;
use App\Services\Facades\MessageFacade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MessageController extends Controller implements MessageConstructor
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        return MessageFacade::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageRequest $request
     * @return MessageResource
     */
    public function store(MessageRequest $request): MessageResource
    {
        return MessageFacade::store($request);
    }
}
