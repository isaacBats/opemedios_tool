@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Newsletter #{{ $newsletter->id }}</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('newsletter.update', ['id' => $newsletter->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="newsletter_id" value="{{ $newsletter->id }}">
                            <div class="form-group">
                                <label for="label">Nombre de la sección</label>
                                <input type="text" name="label" class="form-control" id="label" value="{{ old('label') }}" >
                                @if ($errors->has('label'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">URL</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ old('link') }}" >
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-primary" value="Agregar">
                        </form>
                        <hr>
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Secciones agregadas</h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        @foreach($newsletter->sections as $section)
                                            <li class="list-group-item">
                                                <a href="{!! $section->link !!}" target="_blanck">{{ $section->label }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('home') }}" style="float: right;" class="btn btn-primary">Guardar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection