@if (Auth::user()->onTrial())
    <!-- Trial Reminder -->
    <li class="dropdown-header">{{ trans('nav/subscriptions.trial') }}</li>

    <li>
        <a href="/settings#/subscription">
            <i class="fa fa-fw fa-btn fa-shopping-bag"></i>{{ trans('nav/subscriptions.subscribe') }}
        </a>
    </li>

    <li class="divider"></li>
@endif

@if (Spark::usesTeams() && Auth::user()->currentTeamOnTrial())
    <!-- Team Trial Reminder -->
    <li class="dropdown-header">{{ trans('nav/subscriptions.team-trial') }}</li>

    <li>
        <a href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/subscription">
            <i class="fa fa-fw fa-btn fa-shopping-bag"></i>{{ trans('nav/subscriptions.subscribe') }}
        </a>
    </li>

    <li class="divider"></li>
@endif
