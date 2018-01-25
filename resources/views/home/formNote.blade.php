@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingresa una nota</div>
                <div class="panel-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="input-title">Titulo</label>
                            <input name="title" id="input-title" class="form-control" placeholder="Titulo" />
                        </div>
                        <div class="form-group">
                            <label for="input-url">Link</label>
                            <input type="url" name="url" id="input-url" class="form-control" placeholder="Link" />
                        </div>
                        <div class="form-group">
                            <label>Tema</label>
                            <select class="form-control" name="theme">
                                <option value="">Selecciona un tema</option>
                                @foreach ($themes as $key => $theme)
                                    <option value="{{ $key }}">{{ $theme }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ta-sintesis">Síntesis</label>
                            <textarea name="sintesis" id="ta-sintesis" class="form-control" rows="6"></textarea>
                        </div>
                        <input type="submit" value="Guardar" class="btn btn-primary col-md-2 col-md-offset-10" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea', menubar: false, plugins: 'textcolor contextmenu colorpicker', toolbar: 'undo redo | bold italic strikethrough forecolor backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent' });</script>
@endsection
