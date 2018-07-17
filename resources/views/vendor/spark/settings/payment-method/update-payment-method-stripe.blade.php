<spark-update-payment-method-stripe :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="panel panel-default">
        <!-- Update Payment Method Heading -->
        <div class="panel-heading">
            <div class="pull-left">
                {{ trans('settings/payment-method/update-payment-method-stripe.update-payment-method') }}
            </div>

            <div class="pull-right">
                <span v-if="billable.card_last_four">
                    <i class="fa fa-btn @{{ cardIcon }}"></i>
                    ************@{{ billable.card_last_four }}
                </span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <!-- Card Update Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{ trans('settings/payment-method/update-payment-method-stripe.payment-updated') }}
            </div>

            <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
            <div class="alert alert-danger" v-if="form.errors.has('form')">
                {{ trans('settings/payment-method/update-payment-method-stripe.trouble-validating-card') }}
            </div>

            <form class="form-horizontal" role="form">
                <!-- Billing Address Fields -->
                @if (Spark::collectsBillingAddress())
                    <h2><i class="fa fa-btn fa-map-marker"></i>{{ trans('settings/payment-method/update-payment-method-stripe.billing-address') }}</h2>

                    @include('spark::settings.payment-method.update-payment-method-address')

                    <h2><i class="fa fa-btn fa-credit-card"></i>{{ trans('settings/payment-method/update-payment-method-stripe.credit-card') }}</h2>
            @endif

            <!-- Cardholder's name -->
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-stripe.cardholders-name') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" v-model="cardForm.name">
                    </div>
                </div>

                <!-- Card number -->
                <div class="form-group" :class="{'has-error': cardForm.errors.has('number')}">
                    <label for="number" class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-stripe.card-number') }}</label>

                    <div class="col-md-6">
                        <input type="text"
                               class="form-control"
                               name="number"
                               data-stripe="number"
                               :placeholder="placeholder"
                               v-model="cardForm.number">

                        <span class="help-block" v-show="cardForm.errors.has('number')">
                            @{{ cardForm.errors.get('number') }}
                        </span>
                    </div>
                </div>

                <!-- Security Code -->
                <div class="form-group">
                    <label for="cvc" class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-stripe.security-code') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cvc" data-stripe="cvc" v-model="cardForm.cvc">
                    </div>
                </div>

                <!-- Expiration Information -->
                <div class="form-group">
                    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-stripe.expiration') }}</label>

                    <!-- Month -->
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="month"
                               placeholder="{{ trans('settings/payment-method/update-payment-method-stripe.mm') }}" maxlength="2" data-stripe="exp-month" v-model="cardForm.month">
                    </div>

                    <!-- Year -->
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="year"
                               placeholder="{{ trans('settings/payment-method/update-payment-method-stripe.yyyy') }}" maxlength="4" data-stripe="exp-year" v-model="cardForm.year">
                    </div>
                </div>

                <!-- Zip Code -->
                <div class="form-group" v-if=" ! spark.collectsBillingAddress">
                    <label for="zip" class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-stripe.zip-postal-code') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="zip" v-model="form.zip">
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" @click.prevent="update" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/payment-method/update-payment-method-stripe.updating') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/payment-method/update-payment-method-stripe.update') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-payment-method-stripe>
