<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
{
    public function index(Request $request)
    {
        $tokens = $request->user()->tokens->load('client')->filter(
            function ($token) {
                return $token->client->personal_access_client && ! $token->revoked;
            }
        )->values();

        return view('tokens.index', compact('tokens'));
    }
}
