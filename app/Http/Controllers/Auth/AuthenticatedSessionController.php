<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();
    
        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check user role and redirect accordingly, passing the $user object
        if ($user->role == 'Admin') {
            return redirect()->route('dashboard')->with('user', $user);
        } elseif ($user->role == 'Super') {
            return redirect()->route('super-dashboard')->with('user', $user);
        } else {
            return redirect()->route('dashboard')->with('user', $user); // Default role redirection
        }
    }
    
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
