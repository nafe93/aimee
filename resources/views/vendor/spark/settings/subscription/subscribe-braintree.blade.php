<spark-subscribe-braintree :user="user" :team="team"
                :plans="plans" :billable-type="billableType" inline-template>

    <!-- Common Subscribe Form Contents -->
    @include('spark::settings.subscription.subscribe-common')

    <!-- Billing Information -->
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-btn fa-credit-card"></i>{{ trans('settings/subscription.subscribe-stripe.billing-information') }}</div>

        <div class="panel-body">
            <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
            <div class="alert alert-danger" v-if="form.errors.has('form')">
                {{ trans('settings/subscription.subscribe-stripe.trouble-validating-card') }}
            </div>

            <form class="form-horizontal" role="form">
                <!-- Braintree Container -->
                <div id="braintree-subscribe-container" class="m-b-md"></div>

                <!-- Subscribe Button -->
                <div class="form-group m-b-none p-b-none">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/subscription.subscribe-stripe.subscribing') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/subscription.subscribe-stripe.subscribe') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-subscribe-braintree>
