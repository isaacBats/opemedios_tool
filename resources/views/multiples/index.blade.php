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
            <div style="margin: 0;padding: 0;font-size: 100%;height: 100%;width: 100% !important;">
                <table style="margin: 0;padding: 0;height: 100%;background: #f8f8f8;width: 100% !important;">
                    <tr style="margin: 0;padding: 0;">
                        <td style="margin: 0 auto !important;padding: 0;font-size: 100%;display: block !important;clear: both !important;max-width: 530px !important;">
                            <table style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;border-collapse: collapse;width: 90% !important;">
                                <tr>
                                    <td align="center" class="masthead" style="margin: 0;padding: 0 0;"> <img src="{{asset('images/agrobio.jpg')}}" style="max-width: 100%;display: block;"> </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #015199;">
                                        <p style="margin: 0;padding: 15px 30px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #fff;text-align: right;">{{ ucwords($today) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 30px;background: white;"></td>
                                </tr>
                                @foreach ($newsSorted as $key => $element)
                                    <tr>
                                        <td style="padding: 10px 30px;background: white;">
                                            <h2 style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.25;margin-bottom: 5px;font-weight: bold;">
                                                {{ $key }}
                                            </h2>
                                    @if (is_array($element))
                                        @foreach ($element as $val)
                                            <h3 style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.25;margin-bottom: 5px;font-weight: bold;color: #015199;">
                                                <a href="{{ $val->link }}" style="color: #015199;text-decoration:none">
                                                    {{ $val->title }}
                                                </a>
                                            </h3>
                                            <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                                                {!! $val->content !!}<span style="color: #015199;font-weight: bold;"></span>
                                            </p>
                                        @endforeach
                                            <hr style="margin:0 !important;border: none;border-bottom: dotted 1px #ccc;">
                                        </td>
                                    </tr>    
                                    @else
                                        <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                                            {{ $element }}
                                        </p>
                                        <hr style="margin:0 !important;border: none;border-bottom: dotted 1px #ccc;">
                                    @endif
                                    <!-- N1 -->
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;">
                        <td class="container" style="margin: 0 auto !important;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 580px !important;">
                            <table style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                                <tr style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;">
                                    <td class="content footer" align="center" style="margin: 0;padding: 20px 30px;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;background: none;">
                                        <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #015199;text-align: center;">
                                            @if ($primerasP)
                                                <a href="{{ $linkPrimeras }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;">PRIMERAS PLANAS </a> |
                                            @endif
                                            @if ($portadas)
                                                <a href="{{ $linkPortadas }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> PORTADAS NEGOCIOS</a> |
                                            @endif
                                            @if ($cartones)
                                                <a href="{{ $linkCartones }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> CARTONES</a> |
                                            @endif
                                            @if ($columnasF)
                                                <a href="{{ $linkColumnasF }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> COLUMNAS NEGOCIOS</a> |
                                            @endif
                                            @if ($columnasP)
                                                <a href="{{ $linkColumnas }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> COLUMNAS POLÍTICAS</a>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
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
