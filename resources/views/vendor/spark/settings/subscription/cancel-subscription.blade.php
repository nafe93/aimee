<spark-cancel-subscription :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-danger-outline"
                    @click="confirmCancellation"
                    :disabled="form.busy">

                {{ trans('settings/subscription/cancel-subscription.cancel-subscription') }}
            </button>
        </div>
    </div>

    <!-- Confirm Cancellation Modal -->
    <div class="modal fade" id="modal-confirm-cancellation" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        {{ trans('settings/subscription/cancel-subscription.cancel-subscription') }}
                    </h4>
                </div>

                <div class="modal-body">
                    {{ trans('settings/subscription/cancel-subscription.are-you-sure-cancel') }}
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/subscription/cancel-subscription.no-go-back') }}</button>

                    <button type="button" class="btn btn-danger" @click="cancel" :disabled="form.busy">
                        <span v-if="form.busy">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/subscription/cancel-subscription.cancelling') }}
                        </span>

                        <span v-else>
                            {{ trans('settings/subscription/cancel-subscription.yes-cancel') }}
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</spark-cancel-subscription>
