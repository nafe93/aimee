{{-- ---> OLD CODE Start <--- --}}
{{-- <div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
            {{ trans('settings/subscription/subscribe-common.subscribe') }}
        </div>

        <!-- Interval Selector Button Group -->
        <div class="pull-right">
            <div class="btn-group" v-if="hasMonthlyAndYearlyPlans">
                <!-- Monthly Plans -->
                <button type="button" class="btn btn-default"
                        @click="showMonthlyPlans"
                        :class="{'active': showingMonthlyPlans}">

                    {{ trans('settings/subscription/subscribe-common.monthly') }}
                </button>

                <!-- Yearly Plans -->
                <button type="button" class="btn btn-default"
                        @click="showYearlyPlans"
                        :class="{'active': showingYearlyPlans}">

                    {{ trans('settings/subscription/subscribe-common.yearly') }}
                </button>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <!-- Subscription Notice -->
        <div class="p-b-lg">
            {{ trans('settings/subscription/subscribe-common.not-subscribed-choose') }}
        </div>

        <!-- European VAT Notice -->
        @if (Spark::collectsEuropeanVat())
            <p class="p-b-lg">
                {{ trans('settings/subscription/subscribe-common.prices-exclude-vat') }}
            </p>
        @endif

        <!-- Plan Error Message -->
        <div class="alert alert-danger" v-if="form.errors.has('plan')">
            @{{ form.errors.get('plan') }}
        </div>

        <table class="table table-borderless m-b-none">
            <thead></thead>
            <tbody>
                <tr v-for="plan in paidPlansForActiveInterval">
                    <!-- Plan Name -->
                    <td>
                        <div class="btn-table-align" @click="showPlanDetails(plan)">
                            <span style="cursor: pointer;">
                                <strong>@{{ plan.name }}</strong>
                            </span>
                        </div>
                    </td>

                    <!-- Plan Features Button -->
                    <td>
                        <button class="btn btn-default m-l-sm subscribe-plan-color" @click="showPlanDetails(plan)">
                            <i class="fa fa-btn fa-star-o"></i>{{ trans('settings/subscription/subscribe-common.plan-features') }}
                        </button>
                    </td>

                    <!-- Plan Price -->
                    <td>
                        <div class="btn-table-align">
                            @{{ plan.price | currency spark.currencySymbol }} / @{{ plan.interval | capitalize }}
                        </div>
                    </td>

                    <!-- Trial Days -->
                    <td>
                        <div class="btn-table-align" v-if="plan.trialDays">
                            @{{ plan.trialDays}} {{ trans('settings/subscription/subscribe-common.day-trial') }}
                        </div>
                    </td>

                    <!-- Plan Select Button -->
                    <td class="text-right">
                        <button class="btn btn-primary-outline btn-plan select-monthly"
                                v-if="selectedPlan !== plan"
                                @click="selectPlan(plan)"
                                :disabled="form.busy">

                            Select
                        </button>

                        <button class="btn btn-primary btn-plan select-monthly"
                                v-if="selectedPlan === plan"
                                disabled>

                            <i class="fa fa-btn fa-check"></i>{{ trans('settings/subscription/subscribe-common.selected') }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
 --}}
{{-- ---> OLD CODE End <--- --}}





{{-- ---> NEW CODE Start <--- --}}

{{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
        {{--<div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">--}}
            {{--{{ trans('settings/subscription/subscribe-common.subscribe') }}--}}
        {{--</div>--}}

        {{--<!-- Interval Selector Button Group -->--}}
        {{--<div class="pull-right">--}}
            {{--<div class="btn-group" v-if="hasMonthlyAndYearlyPlans">--}}
                {{--<!-- Monthly Plans -->--}}
                {{--<button type="button" class="btn btn-default"--}}
                        {{--@click="showMonthlyPlans"--}}
                        {{--:class="{'active': showingMonthlyPlans}">--}}

                    {{--{{ trans('settings/subscription/subscribe-common.monthly') }}--}}
                {{--</button>--}}

                {{--<!-- Yearly Plans -->--}}
                {{--<button type="button" class="btn btn-default"--}}
                        {{--@click="showYearlyPlans"--}}
                        {{--:class="{'active': showingYearlyPlans}">--}}

                    {{--{{ trans('settings/subscription/subscribe-common.yearly') }}--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="clearfix"></div>--}}
    {{--</div>--}}

    {{--<div class="panel-body">--}}
        {{--<!-- Subscription Notice -->--}}
        {{--<div class="p-b-lg">--}}
            {{--{{ trans('settings/subscription/subscribe-common.not-subscribed-choose') }}--}}
        {{--</div>--}}

        {{--<!-- European VAT Notice -->--}}
        {{--@if (Spark::collectsEuropeanVat())--}}
            {{--<p class="p-b-lg">--}}
                {{--{{ trans('settings/subscription/subscribe-common.prices-exclude-vat') }}--}}
            {{--</p>--}}
        {{--@endif--}}

        {{--<!-- Plan Error Message -->--}}
        {{--<div class="alert alert-danger" v-if="form.errors.has('plan')">--}}
            {{--@{{ form.errors.get('plan') }}--}}
        {{--</div>--}}

        {{--<table class="table table-borderless m-b-none">--}}
            {{--<thead></thead>--}}
            {{--<tbody>--}}
                {{--<tr v-for="plan in paidPlansForActiveInterval">--}}
                    {{--<!-- Plan Name -->--}}
                    {{--<td>--}}
                        {{--<div class="btn-table-align" @click="showPlanDetails(plan)">--}}
                            {{--<span style="cursor: pointer;">--}}
                                {{--<strong>@{{ plan.name }}</strong>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</td>--}}

                    {{--<!-- Plan Features Button -->--}}
                    {{--<td>--}}
                        {{--<button class="btn btn-default m-l-sm subscribe-plan-color" @click="showPlanDetails(plan)">--}}
                            {{--<i class="fa fa-btn fa-star-o"></i>{{ trans('settings/subscription/subscribe-common.plan-features') }}--}}
                        {{--</button>--}}
                    {{--</td>--}}

                    {{--<!-- Plan Price -->--}}
                    {{--<td>--}}
                        {{--<div class="btn-table-align">--}}
                            {{--@{{ plan.price | currency spark.currencySymbol }} / @{{ plan.interval | capitalize }}--}}
                        {{--</div>--}}
                    {{--</td>--}}

                    {{--<!-- Trial Days -->--}}
                    {{--<td>--}}
                        {{--<div class="btn-table-align" v-if="plan.trialDays">--}}
                            {{--@{{ plan.trialDays}} {{ trans('settings/subscription/subscribe-common.day-trial') }}--}}
                        {{--</div>--}}
                    {{--</td>--}}

                    {{--<!-- Plan Select Button -->--}}
                    {{--<td class="text-right">--}}
                        {{--<button class="btn btn-primary-outline btn-plan select-monthly"--}}
                                {{--v-if="selectedPlan !== plan"--}}
                                {{--@click="selectPlan(plan)"--}}
                                {{--:disabled="form.busy">--}}

                            {{--Select--}}
                        {{--</button>--}}

                        {{--<button class="btn btn-primary btn-plan select-monthly"--}}
                                {{--v-if="selectedPlan === plan"--}}
                                {{--disabled>--}}

                            {{--<i class="fa fa-btn fa-check"></i>{{ trans('settings/subscription/subscribe-common.selected') }}--}}
                        {{--</button>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</div>--}}
{{--</div>--}}


{{-- ---> NEW CODE End <--- --}}