<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            $user = User::findOrFail(auth()->user()->id);
            return view('dashboard', compact('user'));
        }

        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }
    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Получаем файл из запроса
            $fileName = time() . '.' . $file->getClientOriginalExtension(); // Создаем уникальное имя файла
            $file->storeAs('images', $fileName, 'public'); // Сохраняем файл в папку 'public/storage/images'
            $user->image = $fileName; // Сохраняем имя файла в базе данных
        }
        $user->save();
        return redirect()->route('loginPage');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
    public function editPage()
    {
        if (Auth::check()) {
            $user = User::findOrFail(auth()->user()->id);
            return view('users.edit', compact('user'));
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if ($request->hasFile('image')) {
            unlink(public_path('storage/images/' . $user->image));
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $fileName, 'public');
            $user->image = $fileName;
        }
        $user->save();
        return redirect()->route('dashboard');
    }
}
