Hello,
<br />
Here's your invitation to the event.
<br />
<br />
<a href="{{ route('invitations.send', [$invitation->id, 'accept']) }}">Click here to accept the invitation</a>
<br />
<a href="{{ route('invitations.send', [$invitation->id, 'reject']) }}">Click here to reject the invitation</a>
<br />
<br />
Have a nice day!