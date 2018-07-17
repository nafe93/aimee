<spark-current-teams :user="user" :teams="teams" inline-template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('settings/teams/current-teams.current-teams') }}</div>

            <div class="panel-body">
                <table class="table table-borderless m-b-none">
                    <thead>
                        <th></th>
                        <th>{{ trans('settings/teams/current-teams.name') }}</th>
                        <th>{{ trans('settings/teams/current-teams.leader') }}</th>
                        <th></th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr v-for="team in teams">
                            <!-- Photo -->
                            <td>
                                <img :src="team.photo_url" class="spark-team-photo">
                            </td>

                            <!-- Team Name -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ team.name }}
                                </div>
                            </td>

                            <!-- Owner Name -->
                            <td>
                                <div class="btn-table-align">
                                    <span v-if="user.name == team.owner.name">
                                        {{ trans('settings/teams/current-teams.you') }}
                                    </span>

                                    <span v-else>
                                        @{{ team.owner.name }}
                                    </span>
                                </div>
                            </td>

                            <!-- Edit Button -->
                            <td>
                                <a href="/settings/teams/@{{ team.id }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Leave Button -->
                            <td>
                                <button class="btn btn-warning" @click="approveLeavingTeam(team)"
                                    data-toggle="tooltip" title="{{ trans('settings/teams/current-teams.leave-team') }}"
                                    v-if="user.id !== team.owner_id">
                                    <i class="fa fa-sign-out"></i>
                                </button>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <button class="btn btn-danger-outline" @click="approveTeamDelete(team)" v-if="user.id === team.owner_id">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Leave Team Modal -->
        <div class="modal fade" id="modal-leave-team" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="leavingTeam">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('settings/teams/current-teams.current-teams') }} (@{{ leavingTeam.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        {{ trans('settings/teams/current-teams.are-you-sure-leave') }}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/teams/current-teams.no-go-back') }}</button>

                        <button type="button" class="btn btn-warning" @click="leaveTeam" :disabled="leaveTeamForm.busy">
                            {{ trans('settings/teams/current-teams.yes-leave') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Team Modal -->
        <div class="modal fade" id="modal-delete-team" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="deletingTeam">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('settings/teams/current-teams.delete-team') }} (@{{ deletingTeam.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        {{ trans('settings/teams/current-teams.are-you-sure-delete') }}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/teams/current-teams.no-go-back') }}</button>

                        <button type="button" class="btn btn-danger" @click="deleteTeam" :disabled="deleteTeamForm.busy">
                            <span v-if="deleteTeamForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>{{ trans('settings/teams/current-teams.deleting') }}
                            </span>

                            <span v-else>
                                {{ trans('settings/teams/current-teams.yes-delete') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-current-teams>
