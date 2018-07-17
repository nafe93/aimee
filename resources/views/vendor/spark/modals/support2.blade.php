<!-- Customer Support -->
<div class="modal fade" id="modal-support-points" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <p>
                Test
            </p>

            <!-- Modal Actions -->
            <div class="modal-footer border-none">
                <button type="button" class="btn btn-primary" @click.prevent="sendSupportRequest" :disabled="supportForm.busy">
                    <i class="fa fa-btn fa-paper-plane"></i>Send
                </button>
            </div>
        </div>
    </div>
</div>