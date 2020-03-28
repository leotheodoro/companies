@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar funcionário</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <form action="{{route('employees.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome da empresa" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Digite o e-mail da empresa" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o telefone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" value="{{old('cpf')}}">
                                </div>
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" onfocusout="handleCep(event)" name="cep" id="cep" class="form-control" placeholder="Digite o CEP" value="{{old('cep')}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Digite o endereço" value="{{old('address')}}">
                                </div>
                                <div class="form-group">
                                    <label for="neighborhood">Bairro</label>
                                    <input type="text" name="neighborhood" id="neighborhood" class="form-control" placeholder="Digite o bairro" value="{{old('neighborhood')}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="city">Cidade</label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Digite o cidade" value="{{old('city')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Estado</label>
                                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Digite o estado" value="{{old('uf')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Empresa</label>
                                    <select name="company_id" id="company_d" class="form-control">
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
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
        let cep = e.target.value;
        let script = document.createElement('script');
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=handleValues';

        document.body.appendChild(script);
    }

    function handleValues(content) {
        document.getElementById('address').value=(content.logradouro);
        document.getElementById('neighborhood').value=(content.bairro);
        document.getElementById('city').value=(content.localidade);
        document.getElementById('uf').value=(content.uf);
    }
</script>
@endsection
