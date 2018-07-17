<!-- Address -->
<div class="form-group" :class="{'has-error': form.errors.has('address')}">
    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-address.address') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="form.address">

        <span class="help-block" v-show="form.errors.has('address')">
            @{{ form.errors.get('address') }}
        </span>
    </div>
</div>

<!-- Address Line 2 -->
<div class="form-group" :class="{'has-error': form.errors.has('address_line_2')}">
    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-address.address-line-2') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="form.address_line_2">

        <span class="help-block" v-show="form.errors.has('address_line_2')">
            @{{ form.errors.get('address_line_2') }}
        </span>
    </div>
</div>

<!-- City -->
<div class="form-group" :class="{'has-error': form.errors.has('city')}">
    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-address.city') }}</label>

    <div class="col-sm-6">
        <input type="text" class="form-control" v-model="form.city">

        <span class="help-block" v-show="form.errors.has('city')">
            @{{ form.errors.get('city') }}
        </span>
    </div>
</div>

<!-- State & ZIP Code -->
<div class="form-group" :class="{'has-error': form.errors.has('state')}">
    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-address.state-zip-postal-code') }}</label>

    <!-- State -->
    <div class="col-sm-3">
        <input type="text" class="form-control" v-model="form.state" placeholder="{{ trans('settings/payment-method/update-payment-method-address.state') }}">

        <span class="help-block" v-show="form.errors.has('state')">
            @{{ form.errors.get('state') }}
        </span>
    </div>

    <!-- Zip Code -->
    <div class="col-sm-3">
        <input type="text" class="form-control" v-model="form.zip" placeholder="{{ trans('settings/payment-method/update-payment-method-address.postal-code') }}">

        <span class="help-block" v-show="form.errors.has('zip')">
            @{{ form.errors.get('zip') }}
        </span>
    </div>
</div>

<!-- Country -->
<div class="form-group" :class="{'has-error': form.errors.has('country')}">
    <label class="col-md-4 control-label">{{ trans('settings/payment-method/update-payment-method-address.country') }}</label>

    <div class="col-sm-6">
        <select class="form-control" v-model="form.country">
            @foreach (app(Laravel\Spark\Repositories\Geography\CountryRepository::class)->all() as $key => $country)
                <option value="{{ $key }}">{{ $country }}</option>
            @endforeach
        </select>

        <span class="help-block" v-show="form.errors.has('country')">
            @{{ form.errors.get('country') }}
        </span>
    </div>
</div>
