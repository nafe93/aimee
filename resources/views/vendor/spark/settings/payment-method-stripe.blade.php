<spark-payment-method-stripe :user="user" :team="team" :billable-type="billableType" inline-template>
    <div>
        <!-- Current Discount -->
        <div class="panel panel-success" v-if="currentDiscount">
            <div class="panel-heading">{{ trans('settings/payment-method-stripe.current-discount') }}</div>

            <div class="panel-body">
                {{ trans('settings/payment-method-stripe.currently-receive-discount') }} @{{ formattedDiscount(currentDiscount) }}
                for @{{ formattedDiscountDuration(currentDiscount) }}.
            </div>
        </div>

        <!-- Update VAT ID -->
        @if (Spark::collectsEuropeanVat())
            @include('spark::settings.payment-method.update-vat-id')
        @endif

        <!-- Update Card -->
        @include('spark::settings.payment-method.update-payment-method-stripe')

        <div>
            <div v-if="billable.stripe_id">
                <!-- Redeem Coupon -->
                @include('spark::settings.payment-method.redeem-coupon')
            </div>
        </div>
    </div>
</spark-payment-method-stripe>
