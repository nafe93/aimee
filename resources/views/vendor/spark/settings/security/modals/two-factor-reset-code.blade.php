<div class="modal fade" id="modal-show-two-factor-reset-code" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">
                    {{ trans('settings/security/modals/two-factor-reset-code.reset-code') }}
                </h4>
            </div>

            <div class="modal-body">
                <div class="alert alert-warning">
                    {{ trans('settings/security/modals/two-factor-reset-code.') }}
                    <strong>{{ trans('settings/security/modals/two-factor-reset-code.warn-emergency-token') }}</strong>
                </div>

                <pre><code>@{{ twoFactorResetCode }}</code></pre>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('settings/security/modals/two-factor-reset-code.close') }}</button>
            </div>
        </div>
    </div>
</div>
