@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Crear nuevo newsletter</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('newsletter.create') }}" method="POST">
                            {{ csrf_field() }}
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
                            <input type="submit" class="btn btn-primary" value="Crear">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection