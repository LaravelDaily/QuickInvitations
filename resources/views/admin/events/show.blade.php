@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.events.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.events.fields.name')</th>
                            <td field-key='name'>{{ $event->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.events.fields.event-date')</th>
                            <td field-key='event_date'>{{ $event->event_date }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab">Invitations</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="invitations">
<table class="table table-bordered table-striped {{ count($invitations) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.invitations.fields.event')</th>
                        <th>@lang('global.invitations.fields.email')</th>
                        <th>@lang('global.invitations.fields.sent-at')</th>
                        <th>@lang('global.invitations.fields.accepted-at')</th>
                        <th>@lang('global.invitations.fields.rejected-at')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($invitations) > 0)
            @foreach ($invitations as $invitation)
                <tr data-entry-id="{{ $invitation->id }}">
                    <td field-key='event'>{{ $invitation->event->name or '' }}</td>
                                <td field-key='email'>{{ $invitation->email }}</td>
                                <td field-key='sent_at'>{{ $invitation->sent_at }}</td>
                                <td field-key='accepted_at'>{{ $invitation->accepted_at }}</td>
                                <td field-key='rejected_at'>{{ $invitation->rejected_at }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invitations.restore', $invitation->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invitations.perma_del', $invitation->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('invitation_view')
                                    <a href="{{ route('admin.invitations.show',[$invitation->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invitation_edit')
                                    <a href="{{ route('admin.invitations.edit',[$invitation->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invitation_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invitations.destroy', $invitation->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.events.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
