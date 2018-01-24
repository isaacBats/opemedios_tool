@extends('layouts.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ($primerasP)
                        <p>Primeras Planas OK.</p>
                    @else
                        <form class="form-inline" style="margin: 10px 0;" method="post" action="/guardar-link">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="input-url" class="sr-only" >Primeras Planas</label>
                                <input type="url" name="url" class="form-control" placeholder="Primeras Planas" />
                                <input type="hidden" name="type" value="1" />
                            </div>
                            <input type="submit"  value="Guardar" class="btn btn-primary btn-sm mb-2" />
                        </form>
                    @endif
                    @if ($portadas)
                        <p>Portadas Financieras OK.</p>
                    @else
                        <form class="form-inline" style="margin: 10px 0;" method="post" action="/guardar-link">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="input-url" class="sr-only" >Portadas Financieras</label>
                                <input type="url" name="url" class="form-control" placeholder="Portadas Financieras" />
                                <input type="hidden" name="type" value="2" />
                            </div>
                            <input type="submit"  value="Guardar" class="btn btn-primary btn-sm" />
                        </form>
                    @endif
                    @if ($columnasP)
                        <p>Columnas Políticas OK.</p>
                    @else
                        <form class="form-inline" style="margin: 10px 0;" method="post" action="/guardar-link">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="input-url" class="sr-only" >Columnas Políticas</label>
                                <input type="url" name="url" class="form-control" placeholder="Columnas Políticas" />
                                <input type="hidden" name="type" value="3" />
                            </div>
                            <input type="submit"  value="Guardar" class="btn btn-primary btn-sm" />
                        </form>
                    @endif
                    @if ($columnasF)
                        <p>Columnas Financieras OK.</p>
                    @else
                        <form class="form-inline" style="margin: 10px 0;" method="post" action="/guardar-link">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="input-url" class="sr-only" >Columnas Financieras</label>
                                <input type="url" name="url" class="form-control" placeholder="Columnas Financieras" />
                                <input type="hidden" name="type" value="4" />
                            </div>
                            <input type="submit"  value="Guardar" class="btn btn-primary btn-sm" />
                        </form>
                    @endif
                    @if ($cartones)
                        <p>Cartones OK.</p>
                    @else
                        <form class="form-inline" style="margin: 10px 0;" method="post" action="/guardar-link">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="input-url" class="sr-only" >Cartones</label>
                                <input type="url" name="url" class="form-control" placeholder="Cartones" />
                                <input type="hidden" name="type" value="5" />
                            </div>
                            <input type="submit"  value="Guardar" class="btn btn-primary btn-sm" />
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
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
            <div class="row">
                @if ($primerasP)
                    <a href="{{ $linkPrimeras }}">Primeras Planas</a> |
                @endif
                @if ($portadas)
                    <a href="{{ $linkPortadas }}">Portadas Financieras</a> |
                @endif
                @if ($columnasP)
                    <a href="{{ $linkColumnas }}">Columnas Políticas</a> |
                @endif
                @if ($columnasF)
                    <a href="{{ $linkColumnasF }}">Columnas Financieras</a> |
                @endif
                @if ($cartones)
                    <a href="{{ $linkCartones }}">Cartones</a> |
                @endif
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
