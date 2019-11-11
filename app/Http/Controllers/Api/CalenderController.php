<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\CalenderResource;
use App\Http\Resources\Api\CalenderResourceCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
class CalenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        
    }

    public function index(Event $event):CalenderResourceCollection
    {

        return new CalenderResourceCollection(Event::all());

    }
}
