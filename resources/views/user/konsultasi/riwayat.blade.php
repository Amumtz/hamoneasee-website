@extends('user.layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-6">
        <div class="h-10 w-10 border-2 rounded-md shadow-sm">
            <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>
        <h1 class="text-2xl font-bold ml-4">Riwayat Konsultasi</h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        @if($booking->isEmpty())
            <div class="p-8 text-center text-gray-500">
                <i class="fas fa-calendar-times text-4xl mb-4"></i>
                <p>Belum ada riwayat konsultasi</p>
            </div>
        @else
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Psikolog</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sesi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($booking as $booking)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->psikolog->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->tgl_konsul }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->jam_konsul }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->sesi }} Sesi</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                   ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-red-100 text-red-800') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($booking->status === 'pending')
                            <div class="flex space-x-2">
                                <button onclick="showRescheduleModal({{ $booking->id }})" 
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                    <i class="fas fa-calendar-alt mr-1"></i> Ubah Jadwal
                                </button>
                                <button onclick="showCancelModal({{ $booking->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                    <i class="fas fa-times-circle mr-1"></i> Batalkan
                                </button>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<!-- Reschedule Modal -->
<div id="rescheduleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ubah Jadwal Konsultasi</h3>
            <form id="rescheduleForm" action="" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <label class="block text-sm text-gray-600">Tanggal Baru</label>
                    <input type="date" name="tgl_konsul" class="mt-1 w-full rounded-md border-gray-300" required>
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600">Waktu Baru</label>
                    <input type="time" name="jam_konsul" class="mt-1 w-full rounded-md border-gray-300" required>
                </div>
                <div class="mt-4 flex justify-end space-x-3">
                    <button type="button" onclick="closeRescheduleModal()" 
                            class="bg-gray-200 px-4 py-2 rounded text-gray-600 hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cancel Modal -->
<div id="cancelModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Batalkan Konsultasi</h3>
            <form id="cancelForm" action="" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin membatalkan konsultasi ini?</p>
                <div class="mt-4 flex justify-end space-x-3">
                    <button type="button" onclick="closeCancelModal()" 
                            class="bg-gray-200 px-4 py-2 rounded text-gray-600 hover:bg-gray-300">
                        Tidak
                    </button>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Ya, Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showRescheduleModal(bookingId) {
    const modal = document.getElementById('rescheduleModal');
    const form = document.getElementById('rescheduleForm');
    form.action = `/booking/${bookingId}/reschedule`;
    modal.classList.remove('hidden');
}

function closeRescheduleModal() {
    document.getElementById('rescheduleModal').classList.add('hidden');
}

function showCancelModal(bookingId) {
    const modal = document.getElementById('cancelModal');
    const form = document.getElementById('cancelForm');
    form.action = `/booking/${bookingId}/cancel`;
    modal.classList.remove('hidden');
}

function closeCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
}
</script>
@endsection