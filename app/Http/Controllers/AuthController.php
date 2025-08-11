<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
        public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|'
        ]);
    
        $email = $request->email;
        $role = str_ends_with($email, '@admin.com') ? 'admin' : 'user';

        $user = new User();
        $user->name = $request->name;
        $user->email = $email;
        $user->password = Hash::make($request->password);
        $user->role = $role;
        $user->save();
        Auth::login($user); // langsung login setelah register


        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');

        // Session::put('role', $user->role);
    
        // return redirect()->route('auth.login')->with('success', 'Registrasi berhasil!');
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        
        //Validasi inputan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'nullable', // Menambahkan validasi untuk checkbox remember me
        ]);

        // Mencari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Tambahkan pengecekan password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $request->session()->regenerate(); // amankan sesi baru

            $user = Auth::user();
            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');

            // Tanpa remember me, langsung redirect ke dashboard
            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
        }

        // Jika login gagal
        return redirect()->back()->withErrors(['login' => 'Email atau password salah!']);
    }
    public function logout()
    {
        Session::flush(); // Menghapus semua session
        return redirect()->route('auth.login')->with('success', 'Anda telah berhasil logout.');
    }

        public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('gauth_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                $totalUsers = User::count(); // Total all users
                $countUser = User::where('role', 'user')->count(); // Count clients
                $countPsikolog = User::where('role', 'psikolog')->count(); // Count psychologists
        
                return view('user.dashboard.index', compact('totalUsers', 'countUser', 'countPsikolog'));

            }else{
                $newUser = User::create([
                    'name' => $user->name ?? $user->email, // gunakan field 'name'
                    'email' => $user->email,
                    'gauth_id'=> $user->id,
                    'gauth_type'=> 'google',
                    'password' => bcrypt(\Illuminate\Support\Str::random(16)), // generate random password
                    'role' => 'user', // set default role user
                ]);

                Auth::login($newUser);

                $totalUsers = User::count(); // Total all users
                $countUser = User::where('role', 'user')->count(); // Count clients
                $countPsikolog = User::where('role', 'psikolog')->count(); // Count psychologists
                
                return view('user.dashboard.index', compact('totalUsers', 'countUser', 'countPsikolog'));
            }
        } catch (Exception $e) {
            // dd($e->getMessage());
            $totalUsers = User::count(); // Total all users
            $countUser = User::where('role', 'user')->count(); // Count clients
            $countPsikolog = User::where('role', 'psikolog')->count(); // Count psychologists
            
            return view('user.dashboard.index', compact('totalUsers', 'countUser', 'countPsikolog'));
        }
    }

}
