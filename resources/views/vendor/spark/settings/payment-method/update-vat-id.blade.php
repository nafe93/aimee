<spark-update-vat-id :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('settings/payment-method/update-vat-id.update-vat-id') }}</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{ trans('settings/payment-method/update-vat-id.vat-id-updated') }}
            </div>

            <form class="form-horizontal" role="form">
                <!-- VAT ID -->
                <div class="form-group" :class="{'has-error': form.errors.has('vat_id')}">
                    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-vat-id.vat-id') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="vat_id" v-model="form.vat_id">

                        <span class="help-block" v-show="form.errors.has('vat_id')">
                            @{{ form.errors.get('vat_id') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/payment-method/update-vat-id.updating') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/payment-method/update-vat-id.update') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-vat-id>
