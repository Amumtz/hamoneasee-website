@extends('admin.layouts.main')

     

@section('content')
<div class="flex-grow-1 p-4">
<div class="content">
        <h1 class="text-2xl font-bold mb-5 text-left">DATA PODCAST</h1>

        <form method="GET" action="{{ route('admin.podcast.index') }}">
        @csrf
  
          <div class="mb-4">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul podcast..." />
          </div>
          <div class="mb-4">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="{{ route('admin.podcast.index') }}" class="btn btn-secondary">Reset</a>
          </div>
        </form>

        <div class="flex justify-end mb-5">
            <a href="{{ route('admin.podcast.create') }}" class="btn btn-primary">+ Tambah Podcast</a>
        </div>        

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Podcast</h6>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Pembicara</th>
                  <th>Tanggal Publikasi</th>
                  <th>Audio</th>
                  <th>Cover</th>
                  <th>Setting</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($podcast as $pc)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $pc->judul }}</td>
                      <td>{{ $pc->pembicara }}</td>
                      <td>{{ $pc->tgl_publikasi }}</td>
                      <td>
                        <audio controls>
                          <source src="{{asset ('audio/'.$pc->audio)}} " type="audio/mpeg">
                          Your browser does not support the audio element.
                        </audio>
                      </td>
                      <td>
                        <img src="{{asset ('image/' . $pc->image) }}" alt="Cover" style="width: 100px; height: 100px;">
                      </td>
                      <td>
                        <form action="{{ route('admin.podcast.destroy', $pc->id) }}" method="POST">
                        <a href="{{ route('admin.podcast.edit', $pc->id) }}" class="btn btn-primary">Edit</a>
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <footer class="sticky-footer py-4" style="background-color: #7ad8fe;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; HarmonEasee</span>
          </div>
        </div>
      </footer>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>