<spark-send-invitation :user="user" :team="team" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('settings/teams/send-invitation.invite') }}</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{ trans('settings/teams/send-invitation.inviation-sent') }}
            </div>

            <form class="form-horizontal" role="form">
                <!-- E-Mail Address -->
                <div class="form-group" :class="{'has-error': form.errors.has('email')}">
                    <label class="col-md-4 control-label">{{ trans('settings/teams/send-invitation.email-addresses') }}</label>

                    <div class="col-md-6">
                        <select class="form-control" name="emails" style="width: 100%" multiple="multiple"></select>

                        <span class="help-block" v-show="form.errors.has('email')">
                            @{{ form.errors.get('email') }}
                        </span>
                    </div>
                </div>

                <!-- Send Invitation Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="send"
                                :disabled="form.busy">

                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/teams/send-invitation.sending') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/teams/send-invitation.send-invitations') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-send-invitation>
