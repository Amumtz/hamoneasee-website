<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styledaftar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Tambahkan Google API Client -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <title>Daftar</title>
</head>
<body>
    <div class="gambar">
        <img src="img/illustrasi.png" alt="illustrasi" srcset="">
    </div>
    <div class="kotak">
        <div class="tulisan">
            <h1>Daftar</h1>
            <p>Sudah punya akun? <a href="{{ route('auth.login') }}">Login</a></p>
        </div>
        <div class="Sign-In">
            <form action="{{ route('auth.register') }}" method="post">
                @csrf
                <div class="form-item">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required placeholder="Nama Lengkap">
                    <i class="fi fi-sr-user" src=""></i>
                </div>
                
                <div class="form-item">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="nama@gmail.com">
                </div>
                
                <div class="form-item">
                    <label for="Password">Password </label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password" >
                </div>

                <div class="form-item">
                    <label for="konfirmasiPassword">Konfirmasi Password </label>
                    <input type="password" id="konfirmasiPassword" name="konfirmasiPassword" required placeholder="Masukkan password" >
                </div>

                <div class="checkbox">
                    <input type="checkbox" name="konfirmasi" id="konfirmasi">
                    <label for="konfirmasi">Dengan mendaftar, saya menyetujui <a href="#">Ketentuan Pengguna</a> dan <a href="#">Kebijakan Privasi</a></label>
                </div><br>

                <div class="tombol">
                    <button type="submit" value="Daftar">Daftar</button><br>
                    <!-- Ganti dengan Google Sign-In Button -->
                    <div id="g_id_onload"
                         data-client_id="YOUR_GOOGLE_CLIENT_ID"
                         data-context="signup"
                         data-ux_mode="popup"
                         data-callback="handleGoogleSignIn"
                         data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin"
                         data-type="standard"
                         data-shape="rectangular"
                         data-theme="outline"
                         data-text="signup_with"
                         data-size="large"
                         data-logo_alignment="left">
                    </div>
                </div>
            </form>
        </div>
    </div>

   <script>
        function handleGoogleSignIn(response) {
            const credential = response.credential;
            
            fetch('/auth/google/callback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ credential: credential })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect_url;
                } else {
                    alert('Login dengan Google gagal: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat login dengan Google');
            });
        }

        // Inisialisasi Google Sign-In
        google.accounts.id.initialize({
            client_id: "535678591396-3c91cqqle72rlb2etjf1l6qlpkm3lt0k.apps.googleusercontent.com",
            callback: handleGoogleSignIn
        });
    </script>
</body>
</html>