@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                <h1>CRUD Users - Curso Platzi</h1>
                    <div class="card border-0 shadow">
                        
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="name" class="form-control" name="name"  id="name" placeholder="Nombre ..." value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email ..." value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password ...">
                                    </div>
                                    <div class="form-group col-md-1">
                                    <input type="submit" value="->" class="btn btn-xs btn-success" onclick="return confirm('¿Desea crear este usuario??')">
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <td>Nombre</td>
                                <td>Email</td>
                                <td>Creado</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="submit" value="X" class="btn btn-xs btn-danger" onclick="return confirm('¿Desea eliminar el usuario??')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection        

