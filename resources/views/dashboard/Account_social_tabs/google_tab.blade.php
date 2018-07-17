<?php
/**
 * Page user_social_accounts - instagram tab
 * User: Zaitsev Sergei
 * Date: 05.03.2017
 * Time: 12:08
 */

use App\Http\Controllers\ManageUserGoogleAccountsController;
?>

<div id="evPanel5" class="tab-pane fade <?php if($_GET["account"] == "google") echo " in active"?>">
    <!-- Содержимое панели 4 -->
    {{-- <h3>Google accounts</h3> --}}
    <div class="panel-body">
        <div class="row new-socaccount-button-area">
            <div class="col-md-4 col-lg-offset-4">
                <form action="{{route('api.user_google')}}" method="get">
                    <fieldset class="fieldset-socnet">
                        <button type="submit" class="btn btn-primary btn-lg btn-custom-socnet">
                            Add new Google account
                        </button>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="result_data_table">
            <?php echo ManageUserGoogleAccountsController::getGoogleData(); ?>
        </div>
    </div>
</div>
<!-- Modal to delete twitter account -->
<div class="modal fade" id="delete_google_account" tabindex="-1" role="dialog" aria-labelledby="delete_google_account">

</div>