<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Vi5ew\View;
use Illuminate\View\View as IlluminateView;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|IlluminateView
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended('/admin')
                    : view('auth.verify-email');
    }
}
