@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Configuración general</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('newsletter.config') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="emails">Emails</label>
                                <span id="helpBlock" class="help-block">{{ 'Multiples correos separados por coma y sin espacios ejemplo@mail.com,ejemplo@mail.com.' }}</span>
                                <textarea name="emails" id="emails" rows="10" class="form-control">@if($config){{ $config->emails }}@endif</textarea>
                                @if ($errors->has('emails'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emails') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            @if($config)
                                <input type="hidden" name="id" value="{{ $config->id }}">
                                <img class="media-object mb-3" src="{{ asset("images/{$config->banner}") }}" alt="Banner">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalUpdateBanner">Cambiar imagen</a>
                            @else
                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <span id="helpBlock" class="help-block">Seleccionar Imagen (580px x 170px)</span> 
                                    <input type="file" name="banner" class="form-control" id="banner">
                                    @if ($errors->has('banner'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('banner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                            <div class="form-group mt-5">
                                <input type="submit" class="btn btn-primary" value="Actualizar configuracion">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalUpdateBanner" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-modal" method="POST" action="{{ route('newsletter.config.banner') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($config)
                        <input type="hidden" name="id" value="{{ $config->id }}">
                    @endif
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiar Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                <label for="banner" class="col-sm-2 col-md-2 col-form-label text-md-right">Banner</label>

                                <div class="col-sm-8 col-md-8">
                                    <input id="banner" type="file" class="form-control-file @error('banner') is-invalid @enderror" name="banner" >
                                    @if ($errors->has('banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cambiar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .mt-3 {
            margin-top: 1.5rem; 
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .media-object {
            width: 100%;
        }
    </style>
@endsection