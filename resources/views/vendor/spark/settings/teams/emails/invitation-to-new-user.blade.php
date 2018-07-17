{{ trans('settings/teams/emails/invitation-to-new-user.hi') }}

<br><br>

{{ $invitation->team->owner->name }} {{ trans('settings/teams/emails/invitation-to-new-user.has-invited-you') }}

<br><br>

<a href="{{ url('register?invitation='.$invitation->token) }}">{{ url('register?invitation='.$invitation->token) }}</a>

<br><br>

{{ trans('settings/teams/emails/invitation-to-new-user.see-you-soon') }}
