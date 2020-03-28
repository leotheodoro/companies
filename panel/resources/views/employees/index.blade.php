@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Funcionários</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <a href="{{route('employees.create')}}" class="btn btn-primary btn-block">Criar novo funcionário</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->cpf}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{route('employees.show', ['employee' => $employee->id])}}" class="btn btn-info">Ver</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="{{route('employees.edit', ['employee' => $employee->id])}}" class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <form action="{{route('employees.destroy', ['employee' => $employee->id])}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
