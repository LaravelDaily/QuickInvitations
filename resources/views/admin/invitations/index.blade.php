@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invitations.title')</h3>
    @can('invitation_create')
    <p>
        <a href="{{ route('admin.invitations.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="{{ route('admin.invitations.import') }}" class="btn btn-success">@lang('global.app_import_from_csv')</a>
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.invitations.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.invitations.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($invitations) > 0 ? 'datatable' : '' }} @can('invitation_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('invitation_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('invitation_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
                                        @if (!$invitation->sent_at)
                                            <a href="{{ route('admin.invitations.send',[$invitation->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_send')</a>
                                        @endif
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
@stop

@section('javascript') 
    <script>
        @can('invitation_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.invitations.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection