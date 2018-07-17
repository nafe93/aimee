<delete-account :user="user" inline-template>
    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-danger-outline"
                    @click="confirmDelete"
                    :disabled="deleteAccountForm.busy">
                {{ trans('settings/profile/delete-account.delete-account') }}
            </button>
        </div>

        <!-- Delete Team Member Modal -->
        <div class="modal fade" id="modal-delete-account" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('settings/profile/delete-account.delete-account') }} (@{{ user.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        {{ trans('settings/profile/delete-account.are-you-sure-delete') }}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/profile/delete-account.no-go-back') }}</button>

                        <button type="button" class="btn btn-danger" @click="delete" :disabled="deleteAccountForm.busy">
                            <span v-if="deleteAccountForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/profile/delete-account.deleting') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/profile/delete-account.yes-delete') }}
                            </span>

                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</delete-account>