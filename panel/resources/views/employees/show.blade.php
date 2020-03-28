@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ver funcionário</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name"><b>Nome</b></label>
                                <p>{{$employee->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>E-mail</b></label>
                                <p>{{$employee->email}}</p>
                            </div>
                            <div class="form-group">
                                <label for="phone"><b>Telefone</b></label>
                                <p>{{$employee->phone}}</p>
                            </div>
                            <div class="form-group">
                                <label for="cpf"><b>CPF</b></label>
                                <p>{{$employee->cpf}}</p>
                            </div>
                            <div class="form-group">
                                <label for="cep"><b>CEP</b></label>
                                <p>{{$employee->cep}}</p>
                            </div>
                            <div class="form-group">
                                <label for="address"><b>Endereço</b></label>
                                <p>{{$employee->address}}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="city"><b>Cidade</b></label>
                                        <p>{{$employee->city}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="uf"><b>Estado</b></label>
                                        <p>{{$employee->uf}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
