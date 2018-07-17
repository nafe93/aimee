@extends('spark::layouts.app')

@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
@endsection

@section('content')
<style>
    .vertical-center {
        min-height: 100%;
        min-height: 100vh;

        display: flex;
        align-items: center;
    }
</style>
<spark-register-stripe inline-template>
    <div class="vertical-center">
        <div class="spark-screen container">
            <!-- Common Register Form Contents -->
            @include('spark::auth.register-common')

            <!-- Billing Information -->
            <div class="row" v-if="selectedPlan && selectedPlan.price > 0">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('auth/register-stripe.billing-information') }}</div>

                        <div class="panel-body">
                            <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
                            <div class="alert alert-danger" v-if="registerForm.errors.has('form')">
                                {{ trans('auth/register-stripe.trouble-validating-card') }}
                            </div>

                            <form class="form-horizontal" role="form">
                                <!-- Billing Address Fields -->
                                @if (Spark::collectsBillingAddress())
                                    <h2><i class="fa fa-btn fa-map-marker"></i>{{ trans('auth/register-stripe.billing-address') }}</h2>

                                    @include('spark::auth.register-address')

                                    <h2><i class="fa fa-btn fa-credit-card"></i>{{ trans('auth/register-stripe.credit-card') }}</h2>
                                @endif

                                <!-- Cardholder's name -->
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">{{ trans('auth/register-stripe.cardholders-name') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" v-model="cardForm.name">
                                    </div>
                                </div>

                                <!-- Card number -->
                                <div class="form-group" :class="{'has-error': cardForm.errors.has('number')}">
                                    <label class="col-md-4 control-label">{{ trans('auth/register-stripe.card-number') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="number" data-stripe="number" v-model="cardForm.number">

                                        <span class="help-block" v-show="cardForm.errors.has('number')">
                                            @{{ cardForm.errors.get('number') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Security Code -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('auth/register-stripe.security-code') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cvc" data-stripe="cvc" v-model="cardForm.cvc">
                                    </div>
                                </div>

                                <!-- Expiration -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('auth/register-stripe.expiration') }}</label>

                                    <!-- Month -->
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="month"
                                            placeholder="{{ trans('auth/register-stripe.mm') }}" maxlength="2" data-stripe="exp-month" v-model="cardForm.month">
                                    </div>

                                    <!-- Year -->
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="year"
                                            placeholder="{{ trans('auth/register-stripe.yyyy') }}" maxlength="4" data-stripe="exp-year" v-model="cardForm.year">
                                    </div>
                                </div>

                                <!-- ZIP Code -->
                                <div class="form-group" :class="{'has-error': registerForm.errors.has('zip')}" v-if=" ! spark.collectsBillingAddress">
                                    <label class="col-md-4 control-label">{{ trans('auth/register-stripe.zip-postal-code') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="zip" v-model="registerForm.zip">

                                        <span class="help-block" v-show="registerForm.errors.has('zip')">
                                            @{{ registerForm.errors.get('zip') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Coupon Code -->
                                <div class="form-group" :class="{'has-error': registerForm.errors.has('coupon')}" v-if="query.coupon">
                                    <label class="col-md-4 control-label">{{ trans('auth/register-stripe.coupon-code') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="coupon" v-model="registerForm.coupon">

                                        <span class="help-block" v-show="registerForm.errors.has('coupon')">
                                            @{{ registerForm.errors.get('coupon') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Terms And Conditions -->
                                <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div>
                                            <label>
                                                <input type="checkbox" v-model="registerForm.terms">
                                                {{ trans('auth/register-stripe.i-accept-the') }} <a href="/terms" target="_blank">{{ trans('auth/register-stripe.terms-of-service') }}</a>

                                                <span class="help-block" v-show="registerForm.errors.has('terms')">
                                                    <strong>@{{ registerForm.errors.get('terms') }}</strong>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tax / Price Information -->
                                <div class="form-group" v-if="spark.collectsEuropeanVat && countryCollectsVat && selectedPlan">
                                    <label class="col-md-4 control-label">&nbsp;</label>

                                    <div class="col-md-6">
                                        <div class="alert alert-info" style="margin: 0;">
                                            <strong>{{ trans('auth/register-stripe.tax:') }}</strong> @{{ taxAmount(selectedPlan) | currency spark.currencySymbol }}
                                            <br><br>
                                            <strong>{{ trans('auth/register-stripe.total-price-including-tax:') }}</strong>
                                            @{{ priceWithTax(selectedPlan) | currency spark.currencySymbol }} / @{{ selectedPlan.interval | capitalize }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Register Button -->
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                                            <span v-if="registerForm.busy">
                                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('auth/register-stripe.registering') }}
                                            </span>

                                            <span v-else>
                                                <i class="fa fa-btn fa-check-circle"></i>{{ trans('auth/register-stripe.register') }}
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plan Features Modal -->
        @include('spark::modals.plan-details')
    </div>
</spark-register-stripe>
@endsection
