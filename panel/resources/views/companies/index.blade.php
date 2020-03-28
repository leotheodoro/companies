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
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route('companies.show', ['company' => '1'])}}" class="btn btn-info">Ver</a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('companies.edit', ['company' => '1'])}}" class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('companies.destroy', ['company' => '1'])}}" method="POST">
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
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
