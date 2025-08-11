<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>HarmonEase - Podcast</title>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f5f7fa; /* Light gray background */
        }
        /* Custom progress bar styles for better visual */
        #progressBar::-webkit-slider-thumb,
        #volumeSlider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #10B981; /* Green-500 */
            cursor: pointer;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.3); /* Subtle glow */
        }
        #progressBar::-moz-range-thumb,
        #volumeSlider::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #10B981; /* Green-500 */
            cursor: pointer;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.3);
        }
        /* Hide default range input track */
        #progressBar, #volumeSlider {
            background: transparent;
        }
        #progressBar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
        }
        #progressFill {
            z-index: 1;
        }
        #progressBar:focus {
            outline: none;
        }

        .podcast-item:hover {
            background-color: #f0f4f8; /* Light blue-gray on hover */
            cursor: pointer;
        }

        .volume-button {
            position: relative;
            display: flex;
            align-items: center;
        }
        .volume-button input {
            position: absolute;
            left: 30px; /* Adjust as needed */
            width: 80px; /* Adjust slider width */
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
            cursor: pointer;
        }
        .volume-button:hover input {
            opacity: 1;
        }
    </style>
</head>
<body class="flex min-h-screen">
    <div class="flex flex-col flex-grow">
        <header class="bg-white p-4 shadow-sm z-10">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <button class="back-button text-gray-700 text-xl w-10 h-10 flex items-center justify-center rounded-md hover:bg-gray-100 transition-colors">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <nav class="text-gray-600 text-sm">
                        <a href="index.php" class="text-xs hover:underline text-gray-500">Home</a>
                        <span class="mx-2 text-gray-400">›</span>
                        <a href="ruang_edukasi.php" class="text-xs text-gray-500 hover:underline">Ruang Edukasi</a>
                        <span class="mx-2 text-gray-400">›</span>
                        <a href="podcast.php" class="font-medium text-gray-900 hover:underline">Podcast</a>
                    </nav>
                </div>
                
                <div class="relative">
                    <input type="text" placeholder="Search" class="border border-gray-300 rounded-full px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all pl-10">
                    <button class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </div>
        </header>

        <main id="mainContent" class="flex flex-grow overflow-auto pb-48 w-full transition-all duration-300">
            <div class="w-full px-8 pt-8">
                <div class="flex items-center bg-gradient-to-r from-blue-300 to-cyan-500 rounded-lg shadow-lg h-60 p-8 space-x-8">
                    <div class="flex-shrink-0">
                        <img src="{{asset ('img/podcast (1).png') }}" alt="Artist" class="w-48 h-48 rounded-lg shadow-md object-cover">
                    </div>
                    <div>
                        <p class="text-red-700 font-bold text-sm mb-1">Verified Speaker</p>
                        <h1 class="text-4xl text-white font-bold mb-2">Jones</h1>
                        <div class="flex items-center text-white text-opacity-80 mb-4">
                            <i class="fa-solid fa-headphones mr-2 text-sm"></i>
                            <p class="text-sm font-semibold">82,736,050</p>
                            <p class="ml-2 text-sm font-light">monthly listeners</p>
                        </div>
                        <button class="mt-4 bg-white text-blue-600 px-6 py-2 rounded-full shadow-lg hover:bg-blue-50 transition-colors font-semibold text-sm">
                            <i class="fa-solid fa-play mr-2"></i> Play
                        </button>
                    </div>
                </div>
            
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Playlist</h2>
                    <ul class="space-y-4">
                        @forelse ($podcast as $pc)
                            {{-- PENTING: Tambahkan data-audio dengan path ke file audio Anda --}}
                            <li class="flex items-center justify-between border-b border-gray-200 pb-4 podcast-item hover:bg-gray-50 transition-colors duration-200 p-2 rounded-lg"
                                data-audio="{{ asset('audio/' . $pc->audio) }}" {{-- Pastikan $pc->audio_file berisi nama file audio --}}
                            >
                                <div class="flex items-center flex-grow">
                                    <img src="{{asset ('image/' . $pc->image) }}" alt="Cover" class="w-16 h-16 rounded-md mr-4 object-cover shadow-sm">
                                    <div class="flex-grow">
                                        <p class="font-semibold text-gray-800 text-lg">{{ $pc->judul }}</p>
                                        <p class="text-gray-500 text-sm">{{ $pc->pembicara }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-gray-500 space-x-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-headphones mr-2"></i>
                                        <p class="text-sm">460,228,511</p>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-clock mr-2"></i>
                                        <p class="text-sm">3:27</p>
                                    </div>
                                    <button class="love-button text-xl text-gray-400 hover:text-red-500 transition-colors">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                    <button class="add-to-queue-btn bg-blue-500 text-white px-4 py-2 rounded-full text-sm hover:bg-blue-600 transition-colors shadow">
                                        Tambah ke Antrian
                                    </button>
                                </div>
                            </li>
                        @empty
                            <li>
                                <p class="text-gray-600 text-center py-10">Tidak ada data podcast yang tersedia.</p>
                            </li>
                        @endforelse
                    </ul> 
                </div>
                
                <div class="mt-20 text-center py-10 bg-gray-50 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
                </div>
            </div>
        </main> 
        
        <div class="fixed inset-x-0 bottom-0 z-20">
            <footer class="bg-gradient-to-r from-blue-600 to-cyan-700 text-white p-4 flex items-center justify-between shadow-lg">
                <div class="flex items-center flex-grow gap-6">
                    <div class="flex items-center min-w-max">
                        {{-- Menggunakan gambar default jika $pc->image tidak tersedia --}}
                        <img id="footerCover" src="{{ isset($podcast[0]->image) ? asset('image/' . $podcast[0]->image) : 'img/default-cover.png' }}" alt="Cover" class="w-16 h-16 rounded-md object-cover shadow-md">
                        <div class="ml-4">
                            {{-- Menggunakan judul default jika $pc->judul tidak tersedia --}}
                            <p id="footerTitle" class="font-semibold text-lg text-gray-100">{{ isset($podcast[0]->judul) ? $podcast[0]->judul : 'Pilih Podcast' }}</p>
                            {{-- Menggunakan artis default jika $pc->pembicara tidak tersedia --}}
                            <p id="footerArtis" class="font-light text-sm text-gray-200">{{ isset($podcast[0]->pembicara) ? $podcast[0]->pembicara : 'Tidak Diketahui' }}</p>
                        </div>
                        <button class="love-button text-xl text-gray-300 hover:text-red-400 ml-6 transition-colors">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div> 

                    <div class="flex flex-col items-center flex-grow px-8">
                        <div class="flex items-center gap-6 mb-2">
                            <button class="shuffle-button text-xl text-gray-300 hover:text-white transition-colors">
                                <i class="fa-solid fa-shuffle"></i>
                            </button>
                            <button class="prev-button text-2xl text-gray-300 hover:text-white transition-colors">
                                <i class="fa-solid fa-backward"></i>
                            </button>
                            <button id="playButton" class="text-4xl text-white hover:text-gray-200 transition-colors">
                                <i class="fa-solid fa-play-circle"></i>
                            </button>
                            <button class="next-button text-2xl text-gray-300 hover:text-white transition-colors">
                                <i class="fa-solid fa-forward"></i>
                            </button>
                            <button class="repeat-button text-xl text-gray-300 hover:text-white transition-colors">
                                <i class="fa-solid fa-repeat"></i>
                            </button>
                        </div>
                        <div class="flex items-center gap-3 w-full max-w-xl">
                            <span id="currentTime" class="text-xs text-gray-200">0:00</span>
                            <div class="relative flex-grow h-2 rounded-full bg-gray-600 overflow-hidden">
                                <div class="absolute h-full bg-green-400 rounded-full" style="width: 0%" id="progressFill"></div>
                                <input id="progressBar" type="range" min="0" max="100" value="0" class="absolute w-full h-full appearance-none bg-transparent accent-green-500 cursor-pointer z-10">
                            </div>
                            <span id="duration" class="text-xs text-gray-200">0:00</span>
                        </div>
                    </div>
                
                    <div class="flex items-center gap-3 min-w-max pr-4">
                        <button class="volume-button text-xl text-gray-300 hover:text-white relative">
                            <i class="fa-solid fa-volume-high"></i>
                            <input id="volumeSlider" type="range" min="0" max="100" value="50" class="ml-2 w-24 h-1 bg-gray-600 rounded-lg appearance-none cursor-pointer">
                        </button>
                        <button id="toggleQueueButton" class="text-xl text-gray-300 hover:text-white transition-colors ml-4">
                            <i class="fa-solid fa-list-ul"></i> </button>
                    </div>
                </div>
                <audio id="audioPlayer" src="" preload="auto" class="hidden"></audio>
            </footer>
        </div>
    </div>

    <aside id="queueSidebar" class="fixed top-0 right-0 h-full w-1/4 bg-blue-700 text-white py-6 px-6 shadow-xl overflow-y-auto transform translate-x-full transition-transform duration-300 z-30">
        <div class="flex items-center mb-8">
            <img src="external/ellipse23437-cpab-200h.png" alt="Profile" class="w-12 h-12 rounded-full border-2 border-white object-cover">
            <p class="text-lg font-medium ml-4">Samudra Batara</p>
        </div>
        <h2 class="text-xl font-semibold mb-6">Antrian Podcast</h2>
        <ul id="queueList" class="mt-4 space-y-3">
            </ul>
    </aside>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const audioPlayer = document.getElementById('audioPlayer');
        const playButton = document.getElementById('playButton');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');
        const shuffleButton = document.querySelector('.shuffle-button');
        const repeatButton = document.querySelector('.repeat-button');
        const progressBar = document.getElementById('progressBar');
        const progressFill = document.getElementById('progressFill');
        const volumeSlider = document.getElementById('volumeSlider');
        const currentTimeLabel = document.getElementById('currentTime');
        const durationLabel = document.getElementById('duration');
        const footerCover = document.getElementById('footerCover');
        const footerTitle = document.getElementById('footerTitle');
        const footerArtis = document.getElementById('footerArtis');
        const podcastItems = document.querySelectorAll('.podcast-item');
        const queueList = document.getElementById('queueList');
        const queueSidebar = document.getElementById('queueSidebar');
        const toggleQueueButton = document.getElementById('toggleQueueButton');
        const mainContent = document.getElementById('mainContent');

        // PENTING: Jika Anda tidak menyediakan data audio, pemutar tidak akan bekerja.
        // Pastikan atribut `data-audio` ada di setiap `<li>` elemen `podcast-item`
        // Contoh: <li data-audio="{{ asset('audio/' . $pc->audio_file) }}">
        const playlist = Array.from(podcastItems).map(item => {
            const imgElement = item.querySelector('img');
            const titleElement = item.querySelector('.font-semibold.text-gray-800');
            const artistElement = item.querySelector('.text-gray-500.text-sm');
            return {
                audioUrl: item.getAttribute('data-audio'), // Mengambil URL audio dari data-audio
                coverImg: imgElement ? imgElement.src : 'img/default-cover.png',
                title: titleElement ? titleElement.textContent : 'Judul Tidak Diketahui',
                artist: artistElement ? artistElement.textContent : 'Artis Tidak Diketahui'
            };
        });

        let queue = [];
        let currentIndex = -1;

        function formatTime(seconds) {
            if (isNaN(seconds) || seconds < 0) return "0:00";
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = Math.floor(seconds % 60).toString().padStart(2, '0');
            return `${minutes}:${remainingSeconds}`;
        }

        function updatePlayer(index) {
            if (index < 0 || index >= playlist.length || !playlist[index].audioUrl) {
                console.warn("Indeks podcast tidak valid atau URL audio tidak ditemukan:", index, playlist[index]);
                // Reset player if invalid podcast
                audioPlayer.pause();
                audioPlayer.src = "";
                playButton.innerHTML = '<i class="fa-solid fa-play-circle"></i>';
                footerCover.src = 'img/default-cover.png';
                footerTitle.textContent = 'Pilih Podcast';
                footerArtis.textContent = 'Tidak Diketahui';
                currentTimeLabel.textContent = "0:00";
                durationLabel.textContent = "0:00";
                progressBar.value = 0;
                progressFill.style.width = '0%';
                return;
            }

            const { audioUrl, coverImg, title, artist } = playlist[index];
            currentIndex = index;

            audioPlayer.src = audioUrl;
            footerCover.src = coverImg;
            footerTitle.textContent = title;
            footerArtis.textContent = artist;

            audioPlayer.play();
            playButton.innerHTML = '<i class="fa-solid fa-pause-circle"></i>';
        }

        function togglePlay() {
            if (audioPlayer.paused) {
                if (audioPlayer.src === "" && playlist.length > 0) {
                    // If no podcast is selected yet, and there's a playlist, play the first one
                    updatePlayer(0); 
                } else if (audioPlayer.src !== "") {
                    audioPlayer.play();
                    playButton.innerHTML = '<i class="fa-solid fa-pause-circle"></i>';
                } else {
                    console.log("Tidak ada podcast yang tersedia untuk diputar.");
                }
            } else {
                audioPlayer.pause();
                playButton.innerHTML = '<i class="fa-solid fa-play-circle"></i>';
            }
        }

        function playNext() {
            if (queue.length > 0) {
                const nextIndex = queue.shift();
                updatePlayer(nextIndex);
            } else if (currentIndex !== -1 && currentIndex + 1 < playlist.length) {
                updatePlayer(currentIndex + 1);
            } else if (playlist.length > 0) {
                 updatePlayer(0); // Loop back to the beginning if end of playlist
            } else {
                console.log("Antrian kosong dan tidak ada podcast berikutnya.");
                audioPlayer.pause();
                playButton.innerHTML = '<i class="fa-solid fa-play-circle"></i>';
                footerCover.src = 'img/default-cover.png';
                footerTitle.textContent = 'Pilih Podcast';
                footerArtis.textContent = 'Tidak Diketahui';
            }
            updateQueueDisplay();
        }

        function playPrev() {
            if (currentIndex - 1 >= 0) {
                updatePlayer(currentIndex - 1);
            } else if (playlist.length > 0) {
                updatePlayer(playlist.length - 1); // Wrap around to the last podcast
            } else {
                console.log("Sudah di podcast pertama atau tidak ada podcast.");
            }
        }

        function addToQueue(index) {
            if (index !== null && index >= 0 && index < playlist.length && !queue.includes(index)) {
                queue.push(index);
                console.log(`Podcast "${playlist[index].title}" ditambahkan ke antrian.`);
                updateQueueDisplay();
                // If no podcast is currently playing, and this is the first added, start playing it
                if (audioPlayer.src === "" && currentIndex === -1) {
                    updatePlayer(index);
                }
            }
        }

        function updateQueueDisplay() {
            queueList.innerHTML = '';
            if (queue.length === 0) {
                const emptyItem = document.createElement('li');
                emptyItem.textContent = "Antrian kosong.";
                emptyItem.className = "text-gray-300 text-sm italic";
                queueList.appendChild(emptyItem);
                return;
            }

            queue.forEach(index => {
                const { coverImg, title } = playlist[index];
                const listItem = document.createElement('li');
                listItem.className = "flex items-center space-x-3 p-2 bg-blue-600 rounded-md text-white";
                listItem.innerHTML = `
                    <img src="${coverImg}" alt="Cover" class="w-10 h-10 rounded-md object-cover shadow-sm">
                    <p class="text-sm">${title}</p>
                `;
                queueList.appendChild(listItem);
            });
        }

        function setVolume() {
            audioPlayer.volume = volumeSlider.value / 100;
        }

        function toggleRepeat() {
            audioPlayer.loop = !audioPlayer.loop;
            repeatButton.classList.toggle('text-white', audioPlayer.loop);
            repeatButton.classList.toggle('text-gray-300', !audioPlayer.loop);
        }

        // FUNGSI INI ADALAH KUNCI UNTUK MENGONTROL SIDEBAR
        function toggleQueueSidebar() {
            const isHidden = queueSidebar.classList.contains('translate-x-full');
            if (isHidden) {
                queueSidebar.classList.remove('translate-x-full');
                mainContent.classList.remove('w-full');
                mainContent.classList.add('w-3/4');
            } else {
                queueSidebar.classList.add('translate-x-full');
                mainContent.classList.remove('w-3/4');
                mainContent.classList.add('w-full');
            }
        }

        // Event Listeners
        playButton.addEventListener('click', togglePlay);
        nextButton.addEventListener('click', playNext);
        prevButton.addEventListener('click', playPrev);
        shuffleButton.addEventListener('click', function () {
            alert('Shuffle belum diimplementasikan!');
        });
        repeatButton.addEventListener('click', toggleRepeat);

        audioPlayer.addEventListener('timeupdate', () => {
            if (!isNaN(audioPlayer.duration)) {
                const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
                progressBar.value = progress;
                progressFill.style.width = progress + '%';
                currentTimeLabel.textContent = formatTime(audioPlayer.currentTime);
                durationLabel.textContent = formatTime(audioPlayer.duration);
            }
        });

        audioPlayer.addEventListener('ended', () => {
            playNext();
        });

        progressBar.addEventListener('input', function () {
            if (!isNaN(audioPlayer.duration)) {
                audioPlayer.currentTime = (progressBar.value / 100) * audioPlayer.duration;
            }
        });

        volumeSlider.addEventListener('input', setVolume);

        podcastItems.forEach((item, index) => {
            const addQueueButton = item.querySelector('.add-to-queue-btn');
            if (addQueueButton) {
                addQueueButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    addToQueue(index);
                });
            }

            item.addEventListener('click', (event) => {
                if (!event.target.closest('.add-to-queue-btn')) {
                    updatePlayer(index);
                }
            });
        });

        // Toggle queue sidebar button - INI ADALAH EVENT LISTENER UTAMANYA
        toggleQueueButton.addEventListener('click', toggleQueueSidebar);

        // Initialize volume and queue display
        audioPlayer.volume = 0.5;
        volumeSlider.value = 50;
        updateQueueDisplay();
        
        // Back button functionality
        document.querySelector('.back-button').addEventListener('click', function() {
            window.history.back();
        });

        // Initialize footer with details of the first podcast if available, without playing
        if (playlist.length > 0) {
            footerCover.src = playlist[0].coverImg;
            footerTitle.textContent = playlist[0].title;
            footerArtis.textContent = playlist[0].artist;
            // Set audio source but don't play
            audioPlayer.src = playlist[0].audioUrl; 
        }
    });
</script>
</body>
</html>