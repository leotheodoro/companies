@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar funcionário</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <form action="{{route('employees.update', ['employee' => $employee->id])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome da empresa" value="{{$employee->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Digite o e-mail da empresa" value="{{$employee->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o telefone" value="{{$employee->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" value="{{$employee->cpf}}">
                                </div>
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" onfocusout="handleCep(event)" name="cep" id="cep" class="form-control" placeholder="Digite o CEP" value="{{$employee->cep}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Digite o endereço" value="{{$employee->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="neighborhood">Bairro</label>
                                    <input type="text" name="neighborhood" id="neighborhood" class="form-control" placeholder="Digite o bairro" value="{{$employee->neighborhood}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="city">Cidade</label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Digite o cidade" value="{{$employee->city}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Estado</label>
                                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Digite o estado" value="{{$employee->uf}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Empresa</label>
                                    <select name="company_id" id="company_d" class="form-control">
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}" {{$company->id === $employee->company->id ? 'selected' : ''}}>{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function handleCep(e) {
        console.log('oi');
    }
</script>
@endsection
