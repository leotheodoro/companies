@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empresas</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <a href="{{route('companies.create')}}" class="btn btn-primary btn-block">Criar nova empresa</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Ver</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr>
                                        <td>foto</td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>
                                            <a href="{{route('companies.show', ['company' => $company->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>


                                        </td>
                                        <td>
                                            <a href="{{route('companies.edit', ['company' => $company->id])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('companies.destroy', ['company' => $company->id])}}" method="POST">
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
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
