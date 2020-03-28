@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ver empresa</div>

                <div class="card-body">
                    @include('helpers.errors')
                    @include('helpers.success')

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name"><b>Nome</b></label>
                                <p>{{$company->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>E-mail</b></label>
                                <p>{{$company->email}}</p>
                            </div>
                            <div class="form-group">
                                <label for="website"><b>Website</b></label>
                                <p>{{$company->website}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
