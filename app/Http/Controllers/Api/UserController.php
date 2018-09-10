<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show profile for logged in user.
     *
     * @return JsonResource
     */
    public function profile(): JsonResource
    {
        return new ItemResource(Auth::user());
    }
}
