@extends('admin.podcast.layout')

     

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Podcast</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('admin.podcast.index') }}"> Back</a>

            </div>

        </div>

    </div>

     

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    

    <form action="{{ route('admin.podcast.update',$podcast->id) }}" method="POST" enctype="multipart/form-data"> 

        @csrf

        @method('PUT')

     

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Judul:</strong>

                    <textarea type="text" name="judul" value="{{ $podcast->name }}" class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" placeholder="Judul"> {{ $podcast->judul }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Pembicara:</strong>

                    <textarea class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" name="pembicara" placeholder="pembicara">{{ $podcast->pembicara }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Tanggal Publikasi:</strong>

                    <input type="date" name="tanggal_publikasi" class="form-control" placeholder="tanggal_publikasi" value="{{ $podcast->tgl_publikasi }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Audio:</strong>
                    <input type="file" name="audio" class="form-control" placeholder="audio">
            
                    @if ($podcast->audio)
                        <p class="mt-2">File saat ini: <strong>{{ $podcast->audio }}</strong></p>
            
                        <audio controls style="margin-top: 10px;">
                            <source src="{{ asset('audio/' . $podcast->audio) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @endif
                </div>
            </div>
            
            

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Image:</strong>

                    <input type="file" name="image" class="form-control" placeholder="image">

                    @if ($podcast->image)

                        <p class="mt-2">Image saat ini: {{ $podcast->image }}</p>
                        <img src="/image/{{ $podcast->image }}" width="300px">

                    @endif

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

     

    </form>

@endsection