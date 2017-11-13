@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar categoria</h3>
            @include('admin.category._form')
        </div>
    </div>
@endsection