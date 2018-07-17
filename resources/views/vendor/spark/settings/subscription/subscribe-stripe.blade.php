{{--<spark-subscribe-stripe :user="user" :team="team"--}}
                {{--:plans="plans" :billable-type="billableType" inline-template>--}}

    {{--<!-- Common Subscribe Form Contents -->--}}
    {{--@include('spark::settings.subscription.subscribe-common')--}}

    {{--<!-- Billing Information -->--}}
    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">{{ trans('settings/subscription/subscribe-stripe.billing-information') }}</div>--}}

        {{--<div class="panel-body">--}}
            {{--<!-- Generic 500 Level Error Message / Stripe Threw Exception -->--}}
            {{--<div class="alert alert-danger" v-if="form.errors.has('form')">--}}
                {{--{{ trans('settings/subscription/subscribe-stripe.trouble-validating-card') }}--}}
            {{--</div>--}}

            {{--<form class="form-horizontal" role="form">--}}
                {{--<!-- Billing Address Fields -->--}}
                {{--@if (Spark::collectsBillingAddress())--}}
                    {{--<h2><i class="fa fa-btn fa-map-marker"></i>{{ trans('settings/subscription/subscribe-stripe.billing-address') }}</h2>--}}

                    {{--@include('spark::settings.subscription.subscribe-address')--}}

                    {{--<h2><i class="fa fa-btn fa-credit-card"></i>{{ trans('settings/subscription/subscribe-stripe.credit-card') }}</h2>--}}
                {{--@endif--}}

                {{--<!-- Cardholder's name -->--}}
                {{--<div class="form-group">--}}
                    {{--<label for="name" class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.cardholders-name') }}</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control" name="name" v-model="cardForm.name">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Card number -->--}}
                {{--<div class="form-group" :class="{'has-error': cardForm.errors.has('number')}">--}}
                    {{--<label for="number" class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.card-number') }}</label>--}}

                    {{--<div class="col-sm-6">--}}
                        {{--<input type="text" class="form-control" name="number" data-stripe="number" v-model="cardForm.number">--}}

                        {{--<span class="help-block" v-show="cardForm.errors.has('number')">--}}
                            {{--@{{ cardForm.errors.get('number') }}--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Security code -->--}}
                {{--<div class="form-group">--}}
                    {{--<label for="number" class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.security-code') }}</label>--}}

                    {{--<div class="col-sm-6">--}}
                        {{--<input type="text" class="form-control" name="cvc" data-stripe="cvc" v-model="cardForm.cvc">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Expiration -->--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.expiration') }}</label>--}}

                    {{--<!-- Month -->--}}
                    {{--<div class="col-md-3">--}}
                        {{--<input type="text" class="form-control" name="month"--}}
                            {{--placeholder="{{ trans('settings/subscription/subscribe-stripe.mm') }}" maxlength="2" data-stripe="exp-month" v-model="cardForm.month">--}}
                    {{--</div>--}}

                    {{--<!-- Year -->--}}
                    {{--<div class="col-md-3">--}}
                        {{--<input type="text" class="form-control" name="year"--}}
                            {{--placeholder="{{ trans('settings/subscription/subscribe-stripe.yyyy') }}" maxlength="4" data-stripe="exp-year" v-model="cardForm.year">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- ZIP Code -->--}}
                {{--<div class="form-group" v-if=" ! spark.collectsBillingAddress">--}}
                    {{--<label for="number" class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.zip-postal-code') }}</label>--}}

                    {{--<div class="col-sm-6">--}}
                        {{--<input type="text" class="form-control" name="zip" v-model="cardForm.zip">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Coupon -->--}}
                {{--<div class="form-group" :class="{'has-error': form.errors.has('coupon')}">--}}
                    {{--<label class="col-md-4 control-label">{{ trans('settings/subscription/subscribe-stripe.coupon') }}</label>--}}

                    {{--<div class="col-sm-6">--}}
                        {{--<input type="text" class="form-control" v-model="form.coupon">--}}

                        {{--<span class="help-block" v-show="form.errors.has('coupon')">--}}
                            {{--@{{ form.errors.get('coupon') }}--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Tax / Price Information -->--}}
                {{--<div class="form-group" v-if="spark.collectsEuropeanVat && countryCollectsVat && selectedPlan">--}}
                    {{--<label class="col-md-4 control-label">&nbsp;</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="alert alert-info" style="margin: 0;">--}}
                            {{--<strong>{{ trans('settings/subscription/subscribe-stripe.tax:') }}</strong> @{{ taxAmount(selectedPlan) | currency spark.currencySymbol }}--}}
                            {{--<br><br>--}}
                            {{--<strong>{{ trans('settings/subscription/subscribe-stripe.total-price-including-tax:') }}</strong>--}}
                            {{--@{{ priceWithTax(selectedPlan) | currency spark.currencySymbol }} / @{{ selectedPlan.interval | capitalize }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Subscribe Button -->--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-6 col-sm-offset-4">--}}
                        {{--<button type="submit" class="btn btn-primary" @click.prevent="subscribe" :disabled="form.busy">--}}
                            {{--<span v-if="form.busy">--}}
                                {{--<i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/subscription/subscribe-stripe.subscribing') }}--}}
                            {{--</span>--}}

                            {{--<span v-else>--}}
                                {{--{{ trans('settings/subscription/subscribe-stripe.subscribe') }}--}}
                            {{--</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</spark-subscribe-stripe>--}}
