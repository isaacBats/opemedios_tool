@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 20px;">
                    Bloque de notas
                    <button class="btn btn-primary col-md-2 col-md-offset-10" style="margin-top: -28px;" data-toggle="modal" data-target="#modalPreview" >Vista previa</button>
                    
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

<!-- Modal Vista Previa -->
<div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vista Previa del correo</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row" style="height: 100px;">
                <img src="{{asset('images/logo-agrobio-mexico.jpeg')}}" style="height: 80px; padding: 10px;">
                <span style=" margin: 0px 40px 0 50px; color: black; font-size: 20px;">Newsletter</span>
                <span style="margin-left: 80px" >{{ ucwords($today) }}</span>
            </div>
            <div class="row">
                @foreach ($newsSorted as $key => $element)
                    <h3 class="new-title" >{{ $key }}</h3>
                    @if (is_array($element))
                        @foreach ($element as $val)
                            <p>
                                <a href="{{ $val->link }}">{{ $val->title }}</a>
                            </p>
                            <p>
                                {{ $val->content }}
                            </p>
                        @endforeach
                    @else
                        <p>{{ $element }}</p>
                    @endif
                @endforeach
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="/enviar-correo" class="btn btn-primary">Enviar</a>
      </div>
    </div>
  </div>
</div>
@stop
