@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invitations.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.invitations.import_store'], 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_import_from_csv')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('event_id', trans('global.invitations.fields.event').'', ['class' => 'control-label']) !!}
                    {!! Form::select('event_id', $events, old('event_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('event_id'))
                        <p class="help-block">
                            {{ $errors->first('event_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('csv', trans('global.invitations.fields.csv_file').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('csv') !!}
                    <p class="help-block"></p>
                    @if($errors->has('csv'))
                        <p class="help-block">
                            {{ $errors->first('csv') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('adminlte/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop