<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->input('email');

        // If input is not an email, try resolving user by phone number
        if ($input && !filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('no_telpon', $input)->first();
            if ($user) {
                $request->merge(['email' => $user->email]);
            }
        }

        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.email' => 'Nomor telepon atau email tidak valid.',
            'email.required' => 'Email atau nomor telepon wajib diisi.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
