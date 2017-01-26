<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        // make sure we have a token name to use
        $this->validate($request, ['name' => 'required']);

        // create and return with the new token
        return back()->with(
            'token',
            Auth::user()->createToken($request->name)->accessToken
        );
    }
}
