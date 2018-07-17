<?php
/**
 * Page user_social_accounts - linkedIn tab
 * User: Fishouk.Alexey
 * Date: 21.11.2016
 * Time: 18:38
 */

use App\Http\Controllers\ManageUserLinkedInAccountsController;
?>

<div id="evPanel3" class="tab-pane fade <?php if($_GET["account"] == "linkedin") echo " in active"?>">
    <!-- Содержимое панели 2 -->
    {{-- <h3>LinkedIn accounts</h3> --}}
    <div class="panel-body">
        <div class="row new-socaccount-button-area">
            <div class="col-md-4 col-lg-offset-4">
                <form action="{{route('api.user_linkedin')}}" method="get">
                    <fieldset class="fieldset-socnet">
                        <button type="submit" class="btn btn-primary btn-lg btn-custom-socnet">
                            Add new LinkedIn account
                        </button>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="result_data_table">
            <?php echo ManageUserLinkedInAccountsController::getLinkedInData(); ?>
        </div>
    </div>
</div>
<!-- Modal to delete twitter account -->
<div class="modal fade" id="delete_linkedin_account" tabindex="-1" role="dialog" aria-labelledby="delete_linkedin_account">

</div>


