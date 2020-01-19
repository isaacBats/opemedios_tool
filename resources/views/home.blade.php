@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al newsletter de la UNAM</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                    <th>Enviar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($newsletters as $newsletter)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $newsletter->created_at }}</th>
                                        <th>{{ $newsletter->status }}</th>
                                        <th>
                                            <a href="{{ route('newsletter.edit', ['id' => $newsletter->id]) }}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                                            {{-- <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-cog"></i></button></a> --}}
                                            <a href="#" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                            <button type="button" class="btn btn-primary" data-id="'.$ns['id'].'"  data-toggle="modal" data-target="#custom_send" id="btn_custom_send"><i class="fa fa-envelope-open"></i></button>
                                            <button type="button" class="btn btn-danger" data-id="'.$ns['id'].'" id="delete_newsletter"><i class="fa fa-trash"></i></button>
                                        </th>
                                        <th>
                                            <button type="button" class="btn btn-primary" data-id="'.$ns['id'].'" id="send_mail"><i class="fa fa-envelope"></i></button>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No hay elementos para mostrar</td>
                                    </tr>
                                @endforelse
                            </tbody>                  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
