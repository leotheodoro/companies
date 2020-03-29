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
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Ver</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->cpf}}</td>
                                        <td>{{$employee->company->name}}</td>
                                        <td>
                                            <a href="{{route('employees.show', ['employee' => $employee->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{route('employees.edit', ['employee' => $employee->id])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('employees.destroy', ['employee' => $employee->id])}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
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
