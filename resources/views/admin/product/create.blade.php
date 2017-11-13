@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo produto</h3>
            @include('admin.product._form')
        </div>
    </div>
@endsection