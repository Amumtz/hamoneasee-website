@extends('admin.layouts.main')

@section('title', 'Kelola Artikel')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Kelola Artikel</h2>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Artikel
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="10%">Thumbnail</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($artikel as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}" 
                                     class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            </td>
                            <td>{{ Str::limit($item->judul, 50) }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $item->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $item->status == 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.artikel.edit', $item->id) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.artikel.delete', $item->id) }}" method="POST" 
                                      class="d-inline" onsubmit="return confirm('Yakin menghapus artikel?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Belum ada artikel</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $artikel->links() }}
            </div>
        </div>
    </div>
</div>
@endsection