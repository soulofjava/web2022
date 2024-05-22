<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class SSOController extends Controller
{
    public function getLogin(Request $request)
    {
        $request->session()->put("state", $state = Str::random(40));
        $query = http_build_query([
            'client_id' => env('SSO_CLIENT_ID'),
            'redirect_uri' => env('SSO_CLIENT_CALLBACK'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            // 'prompt' => '', // "none", "consent", or "login"
        ]);

        return redirect(env('SSO_HOST_URL') . '/oauth/authorize?' . $query);
    }

    public function getCallback(Request $request)
    {
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class,
            'Invalid state value.'
        );

        $response = Http::withoutVerifying()->asForm()->post(env('SSO_HOST') . '/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('SSO_CLIENT_ID'),
            'client_secret' => env('SSO_CLIENT_SECRET'),
            'redirect_uri' => env('SSO_CLIENT_CALLBACK'),
            'code' => $request->code,
        ]);

        if ($response->successful()) {
            if ($this->connectUser($response->object())) {
                return redirect(route('dashboard'));
            } else {
                return redirect(route('login'));
            }
        } else {
            dd($response->body());
        }
    }

    public function connectUser($tttt)
    {
        $access_token = $tttt->access_token;

        $response = Http::withoutVerifying()->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
        ])->get(env('SSO_HOST') . '/api/user');

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
            $user->password = bcrypt($userArray['email']);
            $user->email_verified_at = $userArray['email_verified_at'];
            $user->save();
        }

        Auth::login($user);

        if (Auth::check()) {
            return true;
        }

        return false;
    }
}
