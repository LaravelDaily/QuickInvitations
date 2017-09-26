<?php

namespace App\Http\Controllers;

use App\Invitation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcceptController extends Controller
{

    public function accept($invitation_id, $action)
    {
        $invitation = Invitation::findOrFail($invitation_id);
        if (!in_array($action, ['accept', 'reject'])) {
            abort(404);
        }

        if ($action == 'accept') {
            $invitation->update(['accepted_at' => Carbon::now()->toDateTimeString()]);
        }
        if ($action == 'reject') {
            $invitation->update(['rejected_at' => Carbon::now()->toDateTimeString()]);
        }

        return 'Your invitation was successfully ' . $action . 'ed';

    }

}
