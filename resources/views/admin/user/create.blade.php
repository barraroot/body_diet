@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo usuário</h3>
            @include('admin.user._form')
        </div>
    </div>
@endsection