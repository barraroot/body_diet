@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova midia</h3>
            @include('admin.midia._form')
        </div>
    </div>
@endsection