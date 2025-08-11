@extends('admin.layouts.main')

@section('content')
<body style="font-family: 'Kanit', sans-serif; background-color: #f8f9fa;">
    <div class="flex-grow-1 p-4">
<div class="content">
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-0">Daftar Konsultasi</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Psikolog</th>
                            <th scope="col">Nama Klien</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Sesi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($konsultasi as $konsultasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $konsultasi->psikolog->name ?? 'N/A'}}</td>
                                <td>{{ $konsultasi->klien->name ?? 'N/A'}}</td>
                                <td>{{ $konsultasi->tgl_konsul }}</td>
                                <td>{{ $konsultasi->jam_konsul }}</td>
                                <td>
                                    @if ($konsultasi->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($konsultasi->status == 'confirmed')
                                        <span class="badge bg-primary">Confirmed</span>
                                    @elseif ($konsultasi->status == 'completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif ($konsultasi->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.konsultasi.edit', $konsultasi->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
