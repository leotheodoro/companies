@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar empresa</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" id="website" class="form-control" placeholder="Digite o nome da empresa" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="website" class="form-control" placeholder="Digite o e-mail da empresa" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Digite o website da empresa" value="{{old('website')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Logo</label>
                                    <input type="file" name="image" id="image" class="form-control">
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
