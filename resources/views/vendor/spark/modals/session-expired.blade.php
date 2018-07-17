<!-- Session Expired Modal -->
<div class="modal fade" id="modal-session-expired" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ trans('modals/session-expired.session-expired') }}
                </h4>
            </div>

            <div class="modal-body">
                {{ trans('modals/session-expired.please-login') }}
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <a href="/login">
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-btn fa-sign-in"></i>{{ trans('modals/session-expired.go-to-login') }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
