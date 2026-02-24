<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {

            $response = Http::asForm()->post(
                config('services.auth_server.url') . '/oauth/token',
                [
                    'grant_type' => 'password',
                    'client_id' => config('services.auth_server.client_id'),
                    'client_secret' => config('services.auth_server.client_secret'),
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ]
            );
            // dd($response->json());
            $data = $response->json();
            if ($response->failed()) {
                if (isset($data['error']) && $data['error'] == 'invalid_client') {
                    return back()->with('error', 'SSO configuration error. Contact admin.');
                }

                if (isset($data['error']) && $data['error'] == 'invalid_grant') {
                    return back()->withInput()->with('error', 'Invalid email or password.');
                }

                return back()->with('error', 'Authentication failed.');
            }

            session([
                'access_token'  => $response['access_token'],
                'refresh_token' => $response['refresh_token'],
            ]);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Auth server unavailable. Try again later.');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function goFoodpanda()
    {
        return redirect()->away(
            'http://127.0.0.1:8080/sso-login?token=' . session('access_token')
        );
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
