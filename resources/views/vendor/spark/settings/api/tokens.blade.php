<spark-tokens :tokens="tokens" :available-abilities="availableAbilities" inline-template>
    <div>
        <div>
            <div class="panel panel-default" v-if="tokens.length > 0">
                <div class="panel-heading">{{ trans('settings/api/tokens.api-tokens') }}</div>

                <div class="panel-body">
                    <table class="table table-borderless m-b-none">
                        <thead>
                            <th>{{ trans('settings/api/tokens.name') }}</th>
                            <th>{{ trans('settings/api/tokens.last-used') }}</th>
                            <th></th>
                            <th></th>
                        </thead>

                        <tbody>
                            <tr v-for="token in tokens">
                                <!-- Name -->
                                <td>
                                    <div class="btn-table-align">
                                        @{{ token.name }}
                                    </div>
                                </td>

                                <!-- Last Used At -->
                                <td>
                                    <div class="btn-table-align">
                                        <span v-if="token.last_used_at">
                                            @{{ token.last_used_at | datetime }}
                                        </span>

                                        <span v-else>
                                            {{ trans('settings/api/tokens.never') }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Edit Button -->
                                <td>
                                    <button class="btn btn-primary" @click="editToken(token)">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <button class="btn btn-danger-outline" @click="approveTokenDelete(token)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Update Token Modal -->
        <div class="modal fade" id="modal-update-token" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="updatingToken">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('settings/api/tokens.edit-token') }} (@{{ updatingToken.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Update Token Form -->
                        <form class="form-horizontal" role="form">
                            <!-- Token Name -->
                            <div class="form-group" :class="{'has-error': updateTokenForm.errors.has('name')}">
                                <label class="col-md-4 control-label">Token Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" v-model="updateTokenForm.name">

                                    <span class="help-block" v-show="updateTokenForm.errors.has('name')">
                                        @{{ updateTokenForm.errors.get('name') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Token Abilities -->
                            <div class="form-group" :class="{'has-error': updateTokenForm.errors.has('abilities')}" v-if="availableAbilities.length > 0">
                                <label class="col-md-4 control-label">{{ trans('settings/api/tokens.token-can') }}</label>

                                <div class="col-md-6">
                                    <div v-for="ability in availableAbilities">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                    @click="toggleAbility(ability.value)"
                                                    :checked="abilityIsAssigned(ability.value)">

                                                    @{{ ability.name }}
                                            </label>
                                        </div>
                                    </div>

                                    <span class="help-block" v-show="updateTokenForm.errors.has('abilities')">
                                        @{{ updateTokenForm.errors.get('abilities') }}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/api/tokens.close') }}</button>

                        <button type="button" class="btn btn-primary" @click="updateToken" :disabled="updateTokenForm.busy">
                        {{ trans('settings/api/tokens.update') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Token Modal -->
        <div class="modal fade" id="modal-delete-token" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="deletingToken">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            {{ trans('settings/api/tokens.delete-token') }} (@{{ deletingToken.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        {{ trans('settings/api/tokens.are-you-sure-delete') }}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/api/tokens.no-go-back') }}</button>

                        <button type="button" class="btn btn-danger" @click="deleteToken" :disabled="deleteTokenForm.busy">
                        {{ trans('settings/api/tokens.yes-delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-tokens>
