@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova cidade</h3>
            @include('admin.city._form')
        </div>
    </div>
@endsection