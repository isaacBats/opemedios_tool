@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bloque de notas
                    <div class="col-md-4 col-md-offset-8">
                        <button class="btn btn-primary mb" >Vista previa</button>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Tema</th>
                                <th>Facha Creación</th>
                                <th>Enviado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <th>{{ $new->title }}</th>
                                    <th>{{ $new->theme_id }}</th>
                                    <th>{{ $new->created_at }}</th>
                                    <th>{{ $new->dispatched ? 'Enviado' : 'No enviado' }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
