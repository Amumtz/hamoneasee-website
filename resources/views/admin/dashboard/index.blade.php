@extends('admin.layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="flex-grow-1 p-4">
    <div class="content">
        <div class="row">
            <!-- Card Total Pengguna -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Pengguna</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Klien -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Klien</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $countUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-3x me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Psikolog -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Psikolog</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $countPsikolog }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-md fa-3x me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Konsultasi -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">Konsultasi</h4>
                        </div>
                        <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">Nama Klien</th>
                                        <th class="font-weight-bold">Nama Psikolog</th>
                                        <th class="font-weight-bold">Tanggal</th>
                                        <th class="font-weight-bold">Jam</th>
                                        <th class="font-weight-bold">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($konsultasi as $item)
                                    <tr>
                                        <td>{{ $item->klien->name ?? 'N/A' }}</td>
                                        <td>{{ $item->psikolog->name ?? 'N/A' }}</td>
                                        <td>{{ $item->tgl_konsul }}</td>
                                        <td>{{ $item->jam_konsul }}</td>
                                        <td>
                                            @if($item->status == 'selesai')
                                                <span class='badge bg-success text-white p-2'>{{ $item->status }}</span>
                                            @elseif($item->status == 'berlangsung')
                                                <span class='badge bg-warning text-dark p-2'>{{ $item->status }}</span>
                                            @else
                                                <span class='badge bg-primary text-white p-2'>{{ $item->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
            <!-- Progress Kesehatan Mental -->
            <div class="col-md-12 grid-margin stretch-card mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Kondisi Kesehatan Mental</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Gangguan Kecemasan <span class="float-right">10%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Depresi <span class="float-right">25%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Anxiety <span class="float-right">15%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Stress <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sehat Mental <span class="float-right">30%</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection