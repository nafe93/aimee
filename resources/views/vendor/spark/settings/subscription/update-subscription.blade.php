<spark-update-subscription :user="user" :team="team"
                :plans="plans" :billable-type="billableType" inline-template>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
                {{ trans('settings/subscription/update-subscription.update-subscription') }}
            </div>

            <!-- Interval Selector Button Group -->
            <div class="pull-right">
                <div class="btn-group" v-if="hasMonthlyAndYearlyPlans">
                    <!-- Monthly Plans -->
                    <button type="button" class="btn btn-default"
                            @click="showMonthlyPlans"
                            :class="{'active': showingMonthlyPlans}">

                        {{ trans('settings/subscription/update-subscription.monthly') }}
                    </button>

                    <!-- Yearly Plans -->
                    <button type="button" class="btn btn-default"
                            @click="showYearlyPlans"
                            :class="{'active': showingYearlyPlans}">

                        {{ trans('settings/subscription/update-subscription.yearly') }}
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

            <!-- Current Subscription (Active) -->
            <div class="p-b-lg" v-if="activePlan.active">
                {{ trans('settings/subscription/update-subscription.currently-subscribed-to') }}
                <strong>@{{ activePlan.name }} (@{{ activePlan.interval | capitalize }})</strong> {{ trans('settings/subscription/update-subscription.plan\.') }}
            </div>

            <!-- Current Subscription (Archived) -->
            <div class="alert alert-warning m-b-lg" v-if=" ! activePlan.active">
                {{ trans('settings/subscription/update-subscription.currently-subscribed-to') }}
                <strong>@{{ activePlan.name }} (@{{ activePlan.interval | capitalize }})</strong> {{ trans('settings/subscription/update-subscription.plan\.') }}
                {{ trans('settings/subscription/update-subscription.plan-discontinued') }}
            </div>

            <!-- European VAT Notice -->
            @if (Spark::collectsEuropeanVat())
                <p class="p-b-lg">
                    {{ trans('settings/subscription/update-subscription.prices-include-vat') }}
                </p>
            @endif

            <table class="table table-borderless m-b-none">
                <thead></thead>
                <tbody>
                    <tr v-for="plan in plansForActiveInterval">
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
                                <i class="fa fa-btn fa-star-o"></i>{{ trans('settings/subscription/update-subscription.plan-features') }}
                            </button>
                        </td>

                        <!-- Plan Price -->
                        <td>
                            <div class="btn-table-align">
                                <span v-if="plan.price == 0">
                                    {{ trans('settings/subscription/update-subscription.free') }}
                                </span>

                                <span v-else>
                                    @{{ priceWithTax(plan) | currency spark.currencySymbol }} / @{{ plan.interval | capitalize }}
                                </span>
                            </div>
                        </td>

                        <!-- Plan Select Button -->
                        <td class="text-right">
                            <button class="btn btn-primary btn-plan" v-if="isActivePlan(plan)" disabled>
                                <i class="fa fa-btn fa-check"></i>{{ trans('settings/subscription/update-subscription.current-plan') }}
                            </button>

                            <button class="btn btn-primary-outline btn-plan"
                                    v-if=" ! isActivePlan(plan) && selectingPlan !== plan"
                                    @click="confirmPlanUpdate(plan)"
                                    :disabled="selectingPlan">

                                Select
                            </button>

                            <button class="btn btn-primary btn-plan"
                                    v-if="selectingPlan && selectingPlan === plan"
                                    disabled>

                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/subscription/update-subscription.updating') }}
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirm Plan Update Modal -->
    <div class="modal fade" id="modal-confirm-plan-update" tabindex="-2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" v-if="confirmingPlan">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ trans('settings/subscription/update-subscription.update-subscription') }}
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p>
                        {{ trans('settings/subscription/update-subscription.are-you-sure-switch') }}
                        <strong>@{{ confirmingPlan.name }} (@{{ confirmingPlan.interval | capitalize }})</strong> {{ trans('settings/subscription/update-subscription.plan?') }}
                    </p>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/subscription/update-subscription.no-go-back') }}</button>

                    <button type="button" class="btn btn-primary" @click="approvePlanUpdate">{{ trans('settings/subscription/update-subscription.yes-im-sure') }}</button>
                </div>
            </div>
        </div>
    </div>
</spark-update-subscription>
