<spark-resume-subscription :user="user" :team="team"
                :plans="plans" :billable-type="billableType" inline-template>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
                {{ trans('settings/subscription/resume-subscription.resume-subscription') }}
            </div>

            <!-- Interval Selector Button Group -->
            <div class="pull-right">
                <div class="btn-group" v-if="hasMonthlyAndYearlyPlans">
                    <!-- Monthly Plans -->
                    <button type="button" class="btn btn-default"
                            @click="showMonthlyPlans"
                            :class="{'active': showingMonthlyPlans}">

                        {{ trans('settings/subscription/resume-subscription.monthly') }}
                    </button>

                    <!-- Yearly Plans -->
                    <button type="button" class="btn btn-default"
                            @click="showYearlyPlans"
                            :class="{'active': showingYearlyPlans}">

                        {{ trans('settings/subscription/resume-subscription.yearly') }}
                    </button>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <!-- Plan Error Message - In General Will Never Be Shown -->
            <div class="alert alert-danger" v-if="planForm.errors.has('plan')">
                @{{ planForm.errors.get('plan') }}
            </div>

            <!-- Cancellation Information -->
            <div class="p-b-lg">
                {{ trans('settings/subscription/resume-subscription.you-have-cancelled') }}
                <strong>@{{ activePlan.name }} (@{{ activePlan.interval | capitalize }})</strong> {{ trans('settings/subscription/resume-subscription.plan\.') }}
            </div>

            <div class="p-b-lg">
                {{ trans('settings/subscription/resume-subscription.benefits-continue-until') }}
                <strong>@{{ activeSubscription.ends_at | date }}</strong>. {{ trans('settings/subscription/resume-subscription.you-may-resume-subscription') }}
            </div>

            <!-- European VAT Notice -->
            @if (Spark::collectsEuropeanVat())
                <p class="p-b-lg">
                    {{ trans('settings/subscription/resume-subscription.prices-include-vat') }}
                </p>
            @endif

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
                            <button class="btn btn-default m-l-sm" @click="showPlanDetails(plan)">
                                <i class="fa fa-btn fa-star-o"></i>{{ trans('settings/subscription/resume-subscription.plan-features') }}
                            </button>
                        </td>

                        <!-- Plan Price -->
                        <td>
                            <div class="btn-table-align">
                                @{{ priceWithTax(plan) | currency spark.currencySymbol }} / @{{ plan.interval | capitalize }}
                            </div>
                        </td>

                        <!-- Plan Select Button -->
                        <td class="text-right">
                            <button class="btn btn-warning btn-plan" @click="updateSubscription(plan)" :disabled="selectingPlan">
                                <span v-if="selectingPlan === plan">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/subscription/resume-subscription.resuming') }}
                                </span>

                                <span v-else>
                                    {{ trans('settings/subscription/resume-subscription.resume') }}
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</spark-resume-subscription>
