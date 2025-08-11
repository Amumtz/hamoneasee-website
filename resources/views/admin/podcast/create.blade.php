@extends('admin.podcast.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

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

     

<form action="{{ route('admin.podcast.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Judul</strong>

                <input type="text" name="judul" class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" placeholder="judul">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Pembicara:</strong>

                <input type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200"
                     name="pembicara" placeholder="pembicara">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Tanggal Publikasi:</strong>

                <input type="date" class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200"
                     name="tgl_publikasi" placeholder="tanggal publikasi">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Audio:</strong>

                <input type="file" name="audio" class="form-control" placeholder="audio" accept="audio/*">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Image:</strong>

                <input type="file" name="image" class="form-control" placeholder="image" accept="image/*">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

     

</form>

@endsection