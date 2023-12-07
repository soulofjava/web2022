<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use App\Mail\InboxMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SSOController extends Controller
{
    public function getLogin(Request $request)
    {
        $request->session()->put("state", $state = Str::random(40));
        $query = http_build_query([
            'client_id' => '99a0195d-c5ef-4f75-ab9b-00ff52429158',
            'redirect_uri' => 'http://127.0.0.1:8001/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            // 'prompt' => '', // "none", "consent", or "login"
        ]);

        return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
    }

    public function getCallback(Request $request)
    {
        $state = $request->session()->pull('state');

        $codeVerifier = $request->session()->pull('code_verifier');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class
        );

        $response = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '99a0195d-c5ef-4f75-ab9b-00ff52429158',
            'client_secret' => 'ktqnJIvq24HdtEzpQpLoXioYiGmF8U6HHXXnv9rm',
            'redirect_uri' => 'http://127.0.0.1:8001/callback',
            'code_verifier' => $codeVerifier,
            'code' => $request->code,
        ]);

        $request->session()->put($response->json());

        return redirect('/ssouser');
    }

    public function connectUser(Request $request)
    {
        $access_token = $request->session()->get('access_token');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
        ])->get('http://127.0.0.1:8000/api/user');

        $userArray = $response->json();

        try {
            $email = $userArray['email'];
        } catch (\Throwable $th) {
            return redirect('login')->withError('Failed to get login information! Try again.');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = new User;
            $user->name = $userArray['name'];
            $user->email = $userArray['email'];
            $user->email_verified_at = $userArray['email_verified_at'];
            $user->save();
        }
        Auth::login($user);
        return redirect(route('dashboard'));
    }
}
