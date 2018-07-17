<spark-kiosk-add-discount inline-template>
    <div>
        <div class="modal fade" id="modal-add-discount" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="discountingUser">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('kiosk/modals/add-discount.add-discount') }} (@{{ discountingUser.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Current Discount -->
                        <div class="alert alert-success" v-if="currentDiscount">
                            {{ trans('kiosk/modals/add-discount.user-has-discount') }} @{{ formattedDiscount(currentDiscount) }}
                            for @{{ formattedDiscountDuration(currentDiscount) }}.
                        </div>

                        <!-- Add Discount Form -->
                        <form class="form-horizontal" role="form">
                            <!-- Discount Type -->
                            <div class="form-group" :class="{'has-error': form.errors.has('type')}">
                                <label class="col-sm-4 control-label">{{ trans('kiosk/modals/add-discount.discount-type') }}</label>

                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="amount" v-model="form.type">&nbsp;&nbsp;{{ trans('kiosk/modals/add-discount.amount') }}
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="percent" v-model="form.type">&nbsp;&nbsp;{{ trans('kiosk/modals/add-discount.percentage') }}
                                        </label>
                                    </div>

                                    <span class="help-block" v-show="form.errors.has('type')">
                                        @{{ form.errors.get('type') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Discount Value -->
                            <div class="form-group" :class="{'has-error': form.errors.has('value')}">
                                <label class="col-md-4 control-label">
                                    <span v-if="form.type == 'percent'">{{ trans('kiosk/modals/add-discount.percentage') }}</span>

                                    <span v-if="form.type == 'amount'">{{ trans('kiosk/modals/add-discount.amount') }}</span>
                                </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" v-model="form.value">

                                    <span class="help-block" v-show="form.errors.has('value')">
                                        @{{ form.errors.get('value') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Discount Duration -->
                            <div class="form-group" :class="{'has-error': form.errors.has('duration')}">
                                <label class="col-sm-4 control-label">{{ trans('kiosk/modals/add-discount.discount-duration') }}</label>

                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="once" v-model="form.duration">&nbsp;&nbsp;{{ trans('kiosk/modals/add-discount.once') }}
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="forever" v-model="form.duration">&nbsp;&nbsp;{{ trans('kiosk/modals/add-discount.forever') }}
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="repeating" v-model="form.duration">&nbsp;&nbsp;{{ trans('kiosk/modals/add-discount.multiple-months') }}
                                        </label>
                                    </div>

                                    <span class="help-block" v-show="form.errors.has('duration')">
                                        @{{ form.errors.get('duration') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Duration Months -->
                            <div class="form-group" :class="{'has-error': form.errors.has('months')}" v-if="form.duration == 'repeating'">
                                <label class="col-md-4 control-label">
                                    Months
                                </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" v-model="form.months">

                                    <span class="help-block" v-show="form.errors.has('months')">
                                        @{{ form.errors.get('months') }}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('kiosk/modals/add-discount.cancel') }}</button>

                        <button type="button" class="btn btn-primary" @click="applyDiscount" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('kiosk/modals/add-discount.applying') }}
                            </span>

                            <span v-else>
                                {{ trans('kiosk/modals/add-discount.apply-discount') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-kiosk-add-discount>
