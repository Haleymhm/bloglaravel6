@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-alert" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Titulo:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Portada:</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Contenido:</label>
                            <textarea class="form-control" name="content" rows="6" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Contenido embebido:</label>
                            <textarea class="form-control" name="iframe" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-succes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection