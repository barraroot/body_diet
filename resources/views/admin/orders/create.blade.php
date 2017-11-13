@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova categoria</h3>
            {!! form($form->add(Icon::create('ok').'&nbsp;&nbsp;Salvar', 'submit', [
                'attr' => ['class' => 'btn btn-primary btn-block'],
            ])) !!}
        </div>
    </div>
@endsection