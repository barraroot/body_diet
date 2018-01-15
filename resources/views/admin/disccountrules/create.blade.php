@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova regra para desconto</h3>
            @include('admin.disccountrules._form')
        </div>
    </div>
@endsection