{{-- filepath: resources/views/user/konsultasi/pembayaran.blade.php --}}
@extends('user.layouts.app')

@section('content')
<div class="flex justify-between mt-20 ml-5">
    <div class="flex items-center">
        <div class="h-10 w-10 border-2 rounded-md shadow-sm">
            <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>
        <nav class="text-gray-600 text-sm ml-5">
            <a href="{{ route('user.dashboard') }}" class="hover:underline">Home</a>
            <span class="mx-2">›</span>
            <a href="{{ route('psikolog.daftar') }}" class="font-medium text-sm hover:underline">Psikolog</a>
            <span class="mx-2">›</span>
            <a href="#" class="font-medium text-sm hover:underline">Jadwal konsultasi</a>
            <span class="mx-2">›</span>
            <span class="font-medium text-sm text-gray-900 hover:underline">Pembayaran</span>
        </nav>
    </div>
</div>
<div class="max-w-8xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <main class="col-span-2 bg-white p-6 rounded-lg shadow-lg border">
            <p class="text-sm text-gray-600">Yuk selesaikan pembayaran dalam <span class="text-black mx-3">00:00:00</span><i class="fa-solid fa-clock mr-2"></i></p>
            <h1 class="text-2xl font-semibold text-cyan-700 mt-6">Mau bayar pakai metode apa?</h1>
            <form id="paymentForm" action="{{ route('bukti.pembayaran', ['booking' => $booking->id]) }}" method="POST" onsubmit="return validatePayment()">
                @csrf
                <div id="accordion-arrow-icon" data-accordion="open" class="mt-5">
                    <!-- Virtual Account -->
                    <h2>
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-900 bg-gray-100 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#va" aria-expanded="true" aria-controls="va">
                            <span>Virtual Account</span>
                        </button>
                    </h2>
                    <div id="va" aria-labelledby="va">
                        <div class="p-5 border border-b-0 border-gray-200 ">
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bca_va" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BCA Virtual Account</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="mandiri_va" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>Mandiri Virtual Account</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bri_va" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BRI Virtual Account</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bni_va" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BNI Virtual Account</span>
                            </label>
                        </div>
                    </div>
                    <!-- Transfer Bank -->
                    <h2>
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#bank" aria-expanded="false" aria-controls="bank">
                            <span>Transfer Bank (ATM/Bank Lainnya)</span>
                        </button>
                    </h2>
                    <div id="bank" class="hidden" aria-labelledby="bank">
                        <div class="p-5 border border-b-0 border-gray-200 ">
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BCA</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="mandiri" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>Mandiri</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bri" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BRI</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="bni" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>BNI</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="cimb" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>CIMB Niaga</span>
                            </label>
                        </div>
                    </div>
                    <!-- E-wallet -->
                    <h2>
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#ewallet" aria-expanded="false" aria-controls="ewallet">
                            <span>E-wallet</span>
                        </button>
                    </h2>
                    <div id="ewallet" class="hidden" aria-labelledby="ewallet">
                        <div class="p-5 border border-t-0 border-gray-200">
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="shopeepay" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>ShopeePay</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="gopay" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>GoPay</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="ovo" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>OVO</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="payment_method" value="linkaja" class="h-4 w-4 text-blue-600 border-gray-300">
                                <span>LinkAja</span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Kolom Kupon -->
                <div class="mt-6">
                    <h3 class="font-medium text-gray-700 mb-2">Pakai Kupon</h3>
                    <div class="flex items-center space-x-3">
                        <input type="text" placeholder="Masukkan kode kupon" class="flex-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Pakai</button>
                    </div>
                </div>
                <!-- Harga & Tombol Bayar -->
                <div class="mt-8 border-t pt-4">
                    <div class="flex items-center justify-between text-lg font-semibold">
                        <span>Total Harga:</span>
                        <span class="text-blue-600">Rp. {{ number_format($booking->psikolog->biaya_konsultasi ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <button type="submit" class="w-full mt-4 px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                        Bayar Sekarang
                    </button>
                </div>
            </form>
        </main>
        <!-- Booking Details Sidebar -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Rincian Booking</h2>
            <div class="mt-4">
                <div class="flex">
                    @if (!empty($booking->psikolog->foto) && file_exists(public_path($booking->psikolog->foto)))
                        <img src="{{ asset($booking->psikolog->foto) }}" alt="Foto Psikolog" class="w-16 h-16 rounded-full mb-4">
                    @else
                        <span class="text-gray-500">Foto tidak tersedia</span>
                    @endif
                    <div class="ml-3">
                        <h1 class="text-base font-medium text-sky-700 justify-center">{{ $booking->psikolog->nama_lengkap ?? '-' }}</h1>
                        <div class="flex justify-center text-center">
                            <i class="fa fa-star text-yellow-400 mt-1 mr-1"></i>
                            <p class="text-green-950 text-base font-medium mr-2">{{ $booking->psikolog->penilaian ?? '-' }}</p>
                            <p class="text-base font-medium mx-2">|</p>
                            <i class="fa fa-briefcase text-gray-800 mt-1 mr-1"></i>
                            <p class="text-gray-800 font-light">{{ $booking->psikolog->pengalaman_tahun ?? '-' }} tahun</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-2 text-gray-700">
                    <p><span class="font-semibold">Jadwal Sesi</span>: {{ $booking->tanggal }}</p>
                    <p><span class="font-semibold">Waktu Sesi</span>: {{ $booking->waktu }}</p>
                    <p><span class="font-semibold">Jumlah Sesi</span>: {{ $booking->sesi }} Sesi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validatePayment() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        alert("Silakan pilih metode pembayaran sebelum melanjutkan.");
        return false;
    }
    return confirm("Apakah Anda yakin ingin melanjutkan ke pembayaran?");
}
</script>
@endsection