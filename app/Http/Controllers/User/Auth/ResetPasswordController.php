<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function reset(ResetPasswordRequest $request)
    {
        // Validation passed, send password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check status and provide feedback to user
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
