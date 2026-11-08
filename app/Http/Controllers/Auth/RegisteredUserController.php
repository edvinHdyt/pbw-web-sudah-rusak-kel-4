<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use PhpParser\Node\Stmt\TryCatch;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:'.User::class],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                "alamat" => $request->alamat,
                "no_telpon" => $request->no_telpon,
                'password' => Hash::make($request->password),
            ]);

            // echo $user->get();

            // $role = Role::where("role", "admin");

            // UserRole::create([
            //     'id_user' => $user->id,
            //     'id_role' => $role->id
            // ]);

            // event(new Registered($user));

            // Auth::login($user);

            return redirect(route('verification.send', absolute: false));
        } catch (\Throwable $th) {

            return json_encode(["error", $th->getMessage()]);
        }

    }
}
