<?php
/**
 * Page user_social_accounts - facebook tab
 * User: Fishouk.Alexey
 * Date: 21.11.2016
 * Time: 18:37
 */

use App\Http\Controllers\ManageUserFacebookAccountsController;
?>

<div id="evPanel2" class="tab-pane fade <?php if($_GET["account"] == "facebook") echo " in active"?>">
    <!-- Содержимое панели 2 -->
    {{-- <h3>Facebook accounts</h3> --}}
    <div class="panel-body">
        <div class="row new-socaccount-button-area">
            <div class="col-md-4 col-lg-offset-4">
                <form action="{{route('api.user_facebook')}}" method="get">
                    <fieldset class="fieldset-socnet">
                        <button type="submit" class="btn btn-primary btn-lg btn-custom-socnet">
                            Add new facebook account
                        </button>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="result_data_table">
            <?php echo ManageUserFacebookAccountsController::getFacebookData(); ?>
        </div>
    </div>
</div>
<!-- Modal to delete twitter account -->
<div class="modal fade" id="delete_facebook_account" tabindex="-1" role="dialog" aria-labelledby="delete_facebook_account">

</div>