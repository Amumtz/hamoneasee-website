@extends('admin.layouts.main')

@section('title', isset($artikel) ? 'Edit Artikel' : 'Tambah Artikel')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="fw-bold mb-0">{{ isset($artikel) ? 'Edit' : 'Tambah' }} Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($artikel) ? route('admin.artikel.update', $artikel->id) : route('admin.artikel.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($artikel))
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                   value="{{ old('judul', $artikel->judul ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control" id="konten" name="konten" rows="10" required>{{ old('konten', $artikel->konten ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="id_kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}" {{ (old('id_kategori', $artikel->id_kategori ?? '') == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" 
                                   {{ !isset($artikel) ? 'required' : '' }}>
                            @if(isset($artikel) && $artikel->thumbnail)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $artikel->thumbnail) }}" 
                                     class="img-thumbnail" style="width: 100%; max-height: 150px; object-fit: cover;">
                                <small class="text-muted">Thumbnail saat ini</small>
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" 
                                       id="draft" value="draft" 
                                       {{ (old('status', $artikel->status ?? 'draft') == 'draft' ? 'checked' : '' }}>
                                <label class="form-check-label" for="draft">Draft</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" 
                                       id="published" value="published" 
                                       {{ (old('status', $artikel->status ?? '') == 'published' ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Blockquote'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 300
    });
</script>
@endsection