<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\User\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use App\User;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResource
    {
        DB::transaction(function () use (&$user, $request) {
            $request->merge(['password' => bcrypt($request->password)]);

            $user = User::create($request->all());
        });

        return new ItemResource($user);
    }
}
