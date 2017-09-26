@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invitations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.invitations.fields.event')</th>
                            <td field-key='event'>{{ $invitation->event->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invitations.fields.email')</th>
                            <td field-key='email'>{{ $invitation->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invitations.fields.sent-at')</th>
                            <td field-key='sent_at'>{{ $invitation->sent_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invitations.fields.accepted-at')</th>
                            <td field-key='accepted_at'>{{ $invitation->accepted_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invitations.fields.rejected-at')</th>
                            <td field-key='rejected_at'>{{ $invitation->rejected_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.invitations.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
