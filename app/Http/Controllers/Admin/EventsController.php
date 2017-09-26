<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Mail\InvitationSend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('event_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('event_delete')) {
                return abort(401);
            }
            $events = Event::onlyTrashed()->get();
        } else {
            $events = Event::all();
        }

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating new Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('event_create')) {
            return abort(401);
        }
        return view('admin.events.create');
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        if (! Gate::allows('event_create')) {
            return abort(401);
        }
        $event = Event::create($request->all());



        return redirect()->route('admin.events.index');
    }


    /**
     * Show the form for editing Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('event_edit')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update Event in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, $id)
    {
        if (! Gate::allows('event_edit')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        $event->update($request->all());



        return redirect()->route('admin.events.index');
    }


    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('event_view')) {
            return abort(401);
        }
        $invitations = \App\Invitation::where('event_id', $id)->get();

        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event', 'invitations'));
    }

    /**
     * Send Invitations Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send($id)
    {
        if (! Gate::allows('event_view')) {
            return abort(401);
        }
        $invitations = \App\Invitation::where('event_id', $id)->whereNull('sent_at')->get();

        foreach ($invitations as $invitation) {
            Mail::to($invitation->email)->send(new InvitationSend($invitation));
            $invitation->update(['sent_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove Event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index');
    }

    /**
     * Delete all selected Event at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Event::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        $event = Event::onlyTrashed()->findOrFail($id);
        $event->restore();

        return redirect()->route('admin.events.index');
    }

    /**
     * Permanently delete Event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        $event = Event::onlyTrashed()->findOrFail($id);
        $event->forceDelete();

        return redirect()->route('admin.events.index');
    }
}
