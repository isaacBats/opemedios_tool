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
                                    <ul id="sections">
                                        @foreach($newsletter->sections as $section)
                                            <li class="list-group-item section-view li-view-{{ $section->id }}" style="padding: 25px 15px">
                                                <a href="{!! $section->link !!}" target="_blanck">{{ $section->label }}</a>
                                                <div style="float: right" class="btns">
                                                    <a href="javascript:void(0)" class="btn-data-edit" data-sectionid="{{ $section->id }}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                                                    <a href="javascript:void(0)" class="btn-data-delete" data-sectionid="{{ $section->id }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item li-form-{{ $section->id }}" style="display: none;">
                                                <form action="{{ route('newsletter.data.update', ['id' => $section->id]) }}" method="POST" class="form-inline">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="label">Nombre de la sección</label>
                                                        <input type="text" class="form-control" name="label" id="label" value="{{ $section->label }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="link">Url</label>
                                                        <input type="text" class="form-control" name="link" id="link" value="{{ $section->link }}">
                                                    </div>
                                                    <input type="submit" value="Actualizar" class="btn btn-primary">                                                    
                                                </form>
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
    <!-- Modal para eliminar newsletter  -->
<div class="modal fade" id="modalDeleteSection" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-modal-delete-section" method="POST" action="" >
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Borrar Sección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        ¿Estas seguro que quieres borrar esta Sección?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Borrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('ul#sections').on('click', 'li.list-group-item.section-view div.btns a.btn-data-edit', function (event) {
                event.preventDefault()

                var sectionId = $(this).data('sectionid')

                var liForm = $(`.li-form-${sectionId}`)
                var liView = $(`.li-view-${sectionId}`)

                liView.hide()

                liForm.show('fast')
            })
            
            $('ul#sections').on('click', 'li.list-group-item.section-view div.btns a.btn-data-delete', function (event) {
                event.preventDefault()

                var sectionId = $(this).data('sectionid')
                var form = $('#form-modal-delete-section')
                var modal = $('#modalDeleteSection')

                form.attr('action', `/newsletter/seccion/delete/${sectionId}`)

                modal.modal('show')

            })
        })
    </script>
@endsection