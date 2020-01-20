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
                        <table class="table table-striped" id="table-newsletters">
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
                                            <a href="{{ route('newsletter.preview', ['id' => $newsletter->id]) }}" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                            <button type="button" class="btn btn-primary" id="send-mail-manual" data-id="{{ $newsletter->id }}"><i class="fa fa-envelope-open"></i></button>
                                            <button type="button" class="btn btn-danger" data-id="'.$ns['id'].'" id="delete_newsletter"><i class="fa fa-trash"></i></button>
                                        </th>
                                        <th>
                                            <a href="{{ route('newsletter.sendmail', ['id' => $newsletter->id]) }}" class="btn btn-primary"><i class="fa fa-envelope"></i></a>
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
<!-- Modal para enviar correo manual  -->
<div class="modal fade" id="modalSendManual" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="" id="form-modal-send-manual">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Ingresa los correos a los que se enviara el newsletter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="emails">Emails</label>
                            <span id="helpBlock" class="help-block">{{ 'Multiples correos separados por coma y sin espacios ejemplo@mail.com,ejemplo@mail.com.' }}</span>
                            <textarea name="emails" id="emails" rows="10" class="form-control"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para eliminar newsletter  -->
<div class="modal fade" id="modalDeleteNewsletter" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{ route('newsletter.config.banner') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
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
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-newsletters').on('click', 'button#send-mail-manual', function(event) {
                event.preventDefault()
                var id = $(this).data('id')
                var modal = $('#modalSendManual')
                var form = $('#form-modal-send-manual')

                form.attr('action', `/newsletter/enviar-mail/${id}`)
                modal.modal('show')
            })
        })
    </script>
@endsection
