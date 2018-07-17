<spark-enable-two-factor-auth :user="user" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('settings/security/enable-two-factor-auth.two-factor-authentication') }}</div>

        <div class="panel-body">
            <!-- Information Message -->
            <div class="alert alert-info">
                {{ trans('settings/security/enable-two-factor-auth.must-install-authy') }}
                <a href="https://authy.com" target="_blank">Authy</a></strong>
            </div>

            <form class="form-horizontal" role="form">
                <!-- Country code -->
                <div class="form-group" :class="{'has-error': form.errors.has('country_code')}">
                    <label class="col-md-4 control-label">{{ trans('settings/security/enable-two-factor-auth.country-code') }}</label>

                    <div class="col-md-6">
                        <input type="number" class="form-control" name="country_code" v-model="form.country_code">

                        <span class="help-block" v-show="form.errors.has('country_code')">
                            @{{ form.errors.get('country_code') }}
                        </span>
                    </div>
                </div>

                <!-- Phone number -->
                <div class="form-group" :class="{'has-error': form.errors.has('phone')}">
                    <label class="col-md-4 control-label">{{ trans('settings/security/enable-two-factor-auth.phone-number') }}</label>

                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="phone" v-model="form.phone">

                        <span class="help-block" v-show="form.errors.has('phone')">
                            @{{ form.errors.get('phone') }}
                        </span>
                    </div>
                </div>

                <!-- Enable Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary aimee-link-color"
                                @click.prevent="enable"
                                :disabled="form.busy">

                            <span v-if="form.busy" class="aimee-link-color">
                                <i class="fa fa-btn fa-spinner fa-spin aimee-link-color"></i>{{ trans('settings/security/enable-two-factor-auth.enabling') }}
                            </span>

                            <span v-else class="aimee-link-color">
                                {{ trans('settings/security/enable-two-factor-auth.enable') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-enable-two-factor-auth>
