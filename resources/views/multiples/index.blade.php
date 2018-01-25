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
            <style type="text/css">
                * { margin: 0; padding: 0; font-size: 100%; font-family: Arial, Helvetica, sans-serif; line-height: 1.65; }
                img { max-width: 80%; margin: 0 auto; display: block; }
                body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; }
                a { color: #71bc37; text-decoration: none; }
                a:hover { text-decoration: underline; }
                .text-center { text-align: center; }
                .text-right { text-align: right; }
                .text-left { text-align: left; }
                .button { display: inline-block; color: white; background:  #015199; border: solid #015199; border-width: 10px 20px 8px;  border-radius: 4px; }
                .button:hover { text-decoration: none; }
                h1, h2, h3, h4, h5, h6 { margin-bottom: 5px; line-height: 1.25; font-weight: normal;}
                h2 { font-size: 14px; color: #666666; font-weight: bold;}
                h3 { font-size: 14px; color: #015199; font-weight: bold;}
                p, ul, ol { font-size: 12px; font-weight: normal; margin-bottom: 10px; color: #666666; }
                .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 700px !important; }
                .container table { width: 100% !important; border-collapse: collapse; }
                .container .masthead { padding: 0 0; }
                .container .masthead h1 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }
                .container .content { background: white; padding: 20px 30px; }
                .container .content.footer { background: none; }
                .container .content.footer p { margin-bottom: 0; color: #015199; text-align: center; font-size: 12px; }
                .container .content.footer a { color: #015199; text-decoration: none; }
                .container .content.footer a:hover { text-decoration: underline; }
                .font { color: #015199; font-weight: bold}
                hr {border:none;border-bottom: dotted 1px #ccc;}
                .date { background-color:  #015199; }
                .date p {color:#fff;padding: 8px 30px; margin-bottom: 0; font-size: 12px}
            </style>
            <table class="body-wrap">
                <tr>
                    <td class="container">
                        <table>
                            <tr>
                                <td align="center" class="masthead">
                                    <img  src="{{asset('images/agrobio.jpg')}}">
                                </td>
                            </tr>
                            <tr>
                                <td class=" date">
                                    <p class="text-right ">{{ ucwords($today) }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="content" >
                                    
                                </td>
                            </tr>
                            @foreach ($newsSorted as $key => $element)
                                <tr>
                                    <td class="content">
                                        <h2>{{ $key }}</h2>
                                @if (is_array($element))
                                    @foreach ($element as $val)
                                        <h3>{{ $val->title }}</h3>
                                        <p>{{ $val->content }}<span class="font"></span></p>
                                        <table>
                                            <tr>
                                                <td >
                                                    <p>
                                                         <a href="{{ $val->link }}" class="button">Continuar Leyendo</a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                    @endforeach
                                        <hr>
                                    </td>
                                </tr>    
                                @else
                                    <p>{{ $element }}</p>
                                @endif
                                <!-- N1 -->
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="container">
                        <table>
                            <tr>
                                <td class="content footer" align="center">
                                    <p>
                                        @if ($primerasP)
                                            <a href="{{ $linkPrimeras }}">PRIMERAS PLANAS </a> | 
                                        @endif
                                        @if ($portadas)
                                            <a href="{{ $linkPortadas }}"> PORTADAS NEGOCIOS</a> | 
                                        @endif
                                        @if ($cartones)
                                            <a href="{{ $linkCartones }}"> CARTONES</a> | 
                                        @endif
                                        @if ($columnasF)
                                            <a href="{{ $linkColumnasF }}"> COLUMNAS NEGOCIOS</a> | 
                                        @endif
                                        @if ($columnasP)
                                            <a href="{{ $linkColumnas }}"> COLUMNAS POLÍTICAS</a>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="/enviar-correo" class="btn btn-primary">Enviar</a>
      </div>
    </div>
  </div>
</div>
@stop
