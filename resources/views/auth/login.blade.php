<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log-In</title>
</head>
<body>
    <div class="gambar">
        <img src="{{ asset('img/illustrasi.png') }}" alt="illustrasi" srcset="">
    </div>
    <div class="kotak">
        <div class="tulisan">
            <h1>Login</h1>
            <p>Belum punya akun hmm? <a href="{{ route('auth.register') }}">Daftar</a></p>
        </div>
        <div class="Login">
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                    <div class="form-item">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="nama@gmail.com">
                    </div>
                    
                    <div class="form-item">
                        <label for="Password">Password </label>
                        <input type="password" id="password" name="password" required placeholder="Masukkan password" >
                    </div>

                    <div class="kata-sandi">
                        <a href="">Lupa kata sandi?</a>
                    </div>

                    <div>
                        <input type="checkbox" name="remember_me" value="remember_me">Remember Me <br>
                    </div>
                    <div class="tombol">
                        <button type="submit" value="Login"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 mb-3">
                            Login
                        </button>
                        <a href="{{ route('oauth.google') }}"
                            class="flex items-center bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 rounded transition duration-150 mb-1 shadow-sm mx-auto max-w-xs"
                            style="display: flex;">
                            <img src="{{ asset('img/Google_Icons-09-512.webp') }}" alt="Google Logo" class="w-8 h-8" />
                            Login with Google
                        </a>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>