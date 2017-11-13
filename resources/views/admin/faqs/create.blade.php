@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova FAQ</h3>
            @include('admin.faqs._form')
        </div>
    </div>
@endsection