<!-- Address -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('address')}">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.address') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="registerForm.address" lazy>

        <span class="help-block" v-show="registerForm.errors.has('address')">
            @{{ registerForm.errors.get('address') }}
        </span>
    </div>
</div>

<!-- Address Line 2 -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('address_line_2')}">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.address-line-2') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="registerForm.address_line_2" lazy>

        <span class="help-block" v-show="registerForm.errors.has('address_line_2')">
            @{{ registerForm.errors.get('address_line_2') }}
        </span>
    </div>
</div>

<!-- City -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('city')}">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.city') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="registerForm.city" lazy>

        <span class="help-block" v-show="registerForm.errors.has('city')">
            @{{ registerForm.errors.get('city') }}
        </span>
    </div>
</div>

<!-- State & ZIP Code -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('state')}">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.state-zip-postal-code') }}</label>

    <!-- State -->
    <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="{{ trans('auth/register-address.state') }}" v-model="registerForm.state" lazy>

        <span class="help-block" v-show="registerForm.errors.has('state')">
            @{{ registerForm.errors.get('state') }}
        </span>
    </div>

    <!-- Zip Code -->
    <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="{{ trans('auth/register-address.postal-code') }}" v-model="registerForm.zip" lazy>

        <span class="help-block" v-show="registerForm.errors.has('zip')">
            @{{ registerForm.errors.get('zip') }}
        </span>
    </div>
</div>

<!-- Country -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('country')}">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.country') }}</label>

    <div class="col-sm-6">
        <select class="form-control" v-model="registerForm.country" lazy>
            @foreach (app(Laravel\Spark\Repositories\Geography\CountryRepository::class)->all() as $key => $country)
                <option value="{{ $key }}">{{ $country }}</option>
            @endforeach
        </select>

        <span class="help-block" v-show="registerForm.errors.has('country')">
            @{{ registerForm.errors.get('country') }}
        </span>
    </div>
</div>

<!-- European VAT ID -->
<div class="form-group" :class="{'has-error': registerForm.errors.has('vat_id')}" v-if="countryCollectsVat">
    <label class="col-md-4 control-label">{{ trans('auth/register-address.vat-id') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="registerForm.vat_id" lazy>

        <span class="help-block" v-show="registerForm.errors.has('vat_id')">
            @{{ registerForm.errors.get('vat_id') }}
        </span>
    </div>
</div>
