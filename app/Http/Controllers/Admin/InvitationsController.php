<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreImportInvitationsRequest;
use App\Invitation;
use App\Mail\InvitationSend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInvitationsRequest;
use App\Http\Requests\Admin\UpdateInvitationsRequest;
use Illuminate\Support\Facades\Mail;

class InvitationsController extends Controller
{
    /**
     * Display a listing of Invitation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('invitation_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('invitation_delete')) {
                return abort(401);
            }
            $invitations = Invitation::onlyTrashed()->get();
        } else {
            $invitations = Invitation::all();
        }

        return view('admin.invitations.index', compact('invitations'));
    }

    /**
     * Show the form for creating new Invitation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('invitation_create')) {
            return abort(401);
        }
        
        $events = \App\Event::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.invitations.create', compact('events'));
    }

    /**
     * Show the form for import new Invitation.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        if (! Gate::allows('invitation_create')) {
            return abort(401);
        }

        $events = \App\Event::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.invitations.import', compact('events'));
    }

    /**
     * Store a newly created Invitation in storage.
     *
     * @param  \App\Http\Requests\StoreInvitationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvitationsRequest $request)
    {
        if (! Gate::allows('invitation_create')) {
            return abort(401);
        }
        $invitation = Invitation::create($request->all());



        return redirect()->route('admin.invitations.index');
    }

    /**
     * Store a newly created Invitation in storage.
     *
     * @param  \App\Http\Requests\StoreImportInvitationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import_store(StoreImportInvitationsRequest $request)
    {
        if (! Gate::allows('invitation_create')) {
            return abort(401);
        }

        $request->file('csv')->storeAs(
            'csv', 'import.csv'
        );

        $handle = fopen(storage_path() . '/app/csv/import.csv', "r");
        $emails = [];
        while ($csvLine = fgetcsv($handle, 1000, ",")) {
            Invitation::create([
                'event_id' => $request->event_id,
                'email' => $csvLine[0]
            ]);
        }

        return redirect()->route('admin.invitations.index');
    }

    /**
     * Show the form for editing Invitation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('invitation_edit')) {
            return abort(401);
        }
        
        $events = \App\Event::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $invitation = Invitation::findOrFail($id);

        return view('admin.invitations.edit', compact('invitation', 'events'));
    }

    /**
     * Update Invitation in storage.
     *
     * @param  \App\Http\Requests\UpdateInvitationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvitationsRequest $request, $id)
    {
        if (! Gate::allows('invitation_edit')) {
            return abort(401);
        }
        $invitation = Invitation::findOrFail($id);
        $invitation->update($request->all());



        return redirect()->route('admin.invitations.index');
    }


    /**
     * Display Invitation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('invitation_view')) {
            return abort(401);
        }
        $invitation = Invitation::findOrFail($id);

        return view('admin.invitations.show', compact('invitation'));
    }

    /**
     * Send Invitation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send($id)
    {
        if (! Gate::allows('invitation_view')) {
            return abort(401);
        }
        $invitation = Invitation::findOrFail($id);
        Mail::to($invitation->email)->send(new InvitationSend($invitation));

        $invitation->update(['sent_at' => Carbon::now()->toDateTimeString()]);

        return redirect()->route('admin.invitations.index');
    }

    /**
     * Remove Invitation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('invitation_delete')) {
            return abort(401);
        }
        $invitation = Invitation::findOrFail($id);
        $invitation->delete();

        return redirect()->route('admin.invitations.index');
    }

    /**
     * Delete all selected Invitation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('invitation_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Invitation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Invitation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('invitation_delete')) {
            return abort(401);
        }
        $invitation = Invitation::onlyTrashed()->findOrFail($id);
        $invitation->restore();

        return redirect()->route('admin.invitations.index');
    }

    /**
     * Permanently delete Invitation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('invitation_delete')) {
            return abort(401);
        }
        $invitation = Invitation::onlyTrashed()->findOrFail($id);
        $invitation->forceDelete();

        return redirect()->route('admin.invitations.index');
    }
}
