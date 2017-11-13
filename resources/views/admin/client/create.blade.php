@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova categoria</h3>
            @include('admin.category._form')
        </div>
    </div>
@endsection