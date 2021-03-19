@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right"> Nuevo</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <td>#</td>
                                <td>Titulo</td>
                                <td>Creado</td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                <td><a href="{{ route('posts.edit', $post) }}" class="btn btn-info">Editar </a></td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="btn btn-danger" onclick="return confirm('Desea eliminar el registro?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
