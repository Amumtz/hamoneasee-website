@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>video</title>
</head>
<body>
    <header class="fixed z-10 w-full px-10 bg-white h-20">
        <div class="flex justify-between mt-5">
            <div class="flex items-center">
                <div class=" h-10 w-10 border-2 rounded-md shadow-sm">
                  <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
                    <i class="fa-solid fa-arrow-left"></i>
                  </button>
                </div>
                <nav class="text-gray-600 text-sm ml-5">
                  <a href="index.php" class="hover:underline">Home</a>
                  <span class="mx-2">›</span>
                  <a href="ruangedukasi.php" class="font-medium text-sm text-gray-900 hover:underline">Ruang Edukasi</a>
                  <span class="mx-2">›</span>
                  <a href="video.php" class="font-medium text-sm text-gray-900 hover:underline">Video</a>
                </nav>
            </div>
            <div class="flex w-80 h-8 rounded-md border border-slate-900">
                <input type="search" name="pencarian" id="pencarian" placeholder=" Search" class="ml-1 my-1 w-full">
                <i class="fa-solid fa-search mt-2 mr-2"></i>
            </div>
            <div class="flex">
                <div class="flex border rounded-full w-10 h-10 bg-gray-200">
                    <button class="text-gray-700 mx-2 my-2">
                        <img src="{{asset ('external/vectori344-knem.svg') }}" alt="" class="h-6 w-6">
                    </button>
                </div>
                <div class="mx-4" id="profile">
                    <img src="{{asset ('external/ellipse23437-cpab-200h.png') }}" alt="" class="w-10 h-10">
                </div>

                <div id="profile-menu" class="absolute right-0 mt-12 w-40 bg-white border rounded-lg shadow-lg hidden">
                  <span class="mx-4 my-2 font-medium">Samudra Batara</span>
                  <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>
                  <a href="settings.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-gear mr-2"></i>Settings</a>
                  <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-right-from-bracket mr-2"></i>Logout</a>
                </div>
            </div>
        </div>
    </header>

    <!-- left section -->
    <div class="flex flex-col px-10 md:flex-row gap-6">
        <!-- Video Section -->
        <div class="flex-1 bg-white p-4 mt-24 ">
          <div class="static">
            <!-- Video Player -->
            <div class="aspect-w-16 aspect-h-12 bg-black rounded-lg">
                <video src="{{asset ('img/One Direction - Where We Are (Official Audio).mp4') }}" class="w-full h-auto max-w-lg mx-auto" controls></video>
            </div>
          </div>
          <h2 class="text-xl font-semibold mt-4 mr-56">How to Deal With Depression and Anxiety?</h2>
          <div class="flex mt-2">
            <div class="mr-4">
              <img src="{{asset ('external/ellipse23437-cpab-200h.png') }}" alt="" class="w-10 h-10">
            </div>
            <div class="my-1 mr-24">
              <span class="text-base font-normal">Sehat Jiwa</span>
            </div>
            <div class="ml-80">
              <button class="mt-2 mx-2">
                <i class="fas fa-thumbs-up text-slate-900 text-2xl hover:text-slate-600"></i> 
              </button>
              <button class="mt-2 mx-2">
                <i class="fas fa-thumbs-down text-slate-900 text-2xl hover:text-slate-600"></i>
              </button>
              <button class="mt-2 mx-2">
                <i class="fas fa-share text-2xl hover:text-slate-600"></i>
              </button>
            </div>
          </div>          
          <p class="text-gray-600 mt-2">
            Dalam video ini, kami membahas langkah-langkah praktis dan strategi efektif untuk
            mengatasi depresi dan kecemasan. Anda akan belajar tentang pentingnya mengenali tanda-tanda awal,
            memahami penyebab utama, dan menerapkan teknik-teknik yang telah terbukti membantu dalam
            mengelola perasaan tertekan dan cemas. Video ini mencakup:
          </p>
          <ul class="list-disc pl-6 text-gray-600 mt-2">
            <li>Pengenalan Depresi dan Kecemasan:</li>
            <ul class="pl-4 list-[circle]">
              <li>Definisi dan perbedaan antara depresi dan kecemasan.</li>
              <li>Gejala umum dan bagaimana mengenalinya dalam kehidupan sehari-hari.</li>
            </ul>
            <li>Teknik Mengelola Stres: ...Lainnya</li>
          </ul>
          
          <form method="POST" action="video.php">
              <p class="text-2xl font-bold">Komentar</p>
              <div class="w-full mt-4 mb-4 border border-gray-200 rounded-lg bg-gray-50">
                  <div class="px-4 py-2 bg-white rounded-t-lg">
                      <label for="comment" class="sr-only">Your comment</label>
                      <textarea id="comment" name="komentar" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0" placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t">
                        <button type="submit" name="add_comment" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                            Post comment
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-full md:w-1/3 bg-white p-4 mt-24 ">
            <h3 class="text-lg font-semibold mb-4">Related video</h3>
            <div class="space-y-4">
              <!-- Video Item -->
              <div class="flex items-center gap-4">
                <img src="{{asset ('external/thumbnailvideo (2).png') }}" alt="Thumbnail" class="w-28 h-16 rounded-lg flex items-center justify-center object-cover">
                <div>
                  <h4 class="text-sm font-medium">How to Master Time Management</h4>
                  <span class="text-xs text-gray-500">00:00</span>
                </div>
              </div>
              <!-- Video Item -->
              <div class="flex items-center gap-4">
                <img src="{{asset ('external/thumbnailvideo (2).png') }}" alt="Thumbnail" class="w-28 h-16 rounded-lg flex items-center justify-center object-cover">
                <div>
                  <h4 class="text-sm font-medium">Memahami Kondisi Gangguan Mental</h4>
                  <span class="text-xs text-gray-500">00:00</span>
                </div>
              </div>
              <!-- Video Item -->
              <div class="flex items-center gap-4">
                <img src="{{asset ('external/thumbnailvideo (2).png') }}" alt="Thumbnail" class="w-28 h-16 rounded-lg flex items-center justify-center object-cover">
                <div>
                  <h4 class="text-sm font-medium">Pentingnya Menjaga Kesehatan Mental</h4>
                  <span class="text-xs text-gray-500">00:00</span>
                </div>
              </div>
            </div>
        </div>
    </div>
</body>
<script>
  // Ambil elemen tombol profil dan menu
  const profileButton = document.getElementById('profile');
  const profileMenu = document.getElementById('profile-menu');

  // Tambahkan event listener untuk toggle menu
  profileButton.addEventListener('click', () => {
      profileMenu.classList.toggle('hidden'); // Menampilkan/menghilangkan menu
  });

  // Menutup menu dropdown ketika klik di luar area menu
  document.addEventListener('click', (event) => {
      if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
          profileMenu.classList.add('hidden'); // Sembunyikan menu jika klik di luar
      }
  });
</script>
</html>