<!-- Customer Support -->
<div class="modal fade" id="modal-support" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-b-none">
                <form class="form-horizontal p-b-none m-b-none" role="form">
                    <!-- From -->
                    {{ csrf_field() }}
                    <div class="form-group" :class="{'has-error': supportForm.errors.has('from')}">
                        <div class="col-md-12">
                            <input id="support-from" type="text" class="form-control" v-model="supportForm.from" placeholder="{{ trans('modals/support.your-email-address') }}">

                            <span class="help-block" v-show="supportForm.errors.has('from')">
                                @{{ supportForm.errors.get('from') }}
                            </span>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="form-group" :class="{'has-error': supportForm.errors.has('subject')}">
                        <div class="col-md-12">
                            <input id="support-subject" type="text" class="form-control" v-model="supportForm.subject" placeholder="{{ trans('modals/support.subject') }}">

                            <span class="help-block" v-show="supportForm.errors.has('subject')">
                                @{{ supportForm.errors.get('subject') }}
                            </span>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-group m-b-none" :class="{'has-error': supportForm.errors.has('message')}">
                        <div class="col-md-12">
                            <textarea id="support-text" class="form-control" rows="7" v-model="supportForm.message" placeholder="{{ trans('modals/support.message') }}"></textarea>

                            <span class="help-block" v-show="supportForm.errors.has('message')">
                                @{{ supportForm.errors.get('message') }}
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer border-none">
                <button id="cancel-send-to-suppot-btn" type="button" class="btn btn-primary">
                    <i class="fa fa-btn fa-close"></i>Cancel
                </button>
                {{-- <button id="send-to-suppot-btn" type="button" class="btn btn-primary" @click.prevent="sendSupportRequest" :disabled="supportForm.busy">
                    <i class="fa fa-btn fa-paper-plane"></i>Send
                </button> --}}
                <button id="send-to-suppot-btn" type="button" class="btn btn-primary" onclick="sendMailToSupport()">
                    <i class="fa fa-btn fa-paper-plane"></i>Send
                </button>
            </div>
        </div>
    </div>
</div>
