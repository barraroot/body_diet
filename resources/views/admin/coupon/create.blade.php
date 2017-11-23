@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo Cupom</h3>
            @include('admin.coupon._form')
        </div>
    </div>
@endsection