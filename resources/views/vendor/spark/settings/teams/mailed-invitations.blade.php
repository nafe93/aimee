<spark-mailed-invitations :invitations="invitations" inline-template>
    <div>
        <div class="panel panel-default" v-if="invitations.length > 0">
            <div class="panel-heading">{{ trans('settings/teams/mailed-invitations.mailed-invitations') }}</div>

            <div class="panel-body">
                <table class="table table-borderless m-b-none">
                    <thead>
                        <th>{{ trans('settings/teams/mailed-invitations.email-address') }}</th>
                        <th>{{ trans('settings/teams/mailed-invitations.date') }}</th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr v-for="invitation in invitations">
                            <!-- E-Mail Address -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ invitation.email }}
                                </div>
                            </td>

                            <!-- Date -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ invitation.created_at | datetime }}
                                </div>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <button class="btn btn-danger-outline" @click="cancel(invitation)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</spark-mailed-invitations>
