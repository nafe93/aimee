<div class="panel panel-warning" v-if="subscriptionIsOnTrial">
    <div class="panel-heading">
        <i class="fa fa-btn fa-clock-o"></i>{{ trans('settings/subscription/trial-expiration-notice.free-trial') }}
    </div>

    <div class="panel-body">
        {{ trans('settings/subscription/trial-expiration-notice.expire-on') }} <strong>@{{ trialEndsAt }}</strong>.
    </div>
</div>
