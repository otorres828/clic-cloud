<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //LOGIN
    public function mostrar_login()
    {
        if(auth()->check())
        return redirect('panel');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('panel');
        }

        return redirect()->back()->withErrors([
            'error' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function mostrar_register(){
        if(auth()->check())
        return redirect('panel');
        return view('auth.register');
    }

    //REGISTRO
    public function register(Request $request)
    {

        // Validar los datos del formulario de registro
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // Si la validación falla, redireccionar al usuario al formulario de registro con los errores
        if ($validator->fails()) {
            return redirect('registrarse')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Iniciar sesión automáticamente al usuario recién registrado
        Auth::login($user);
    
        // Redireccionar al usuario a su perfil o a cualquier otra página que desees
        return redirect('/panel');
    }
}