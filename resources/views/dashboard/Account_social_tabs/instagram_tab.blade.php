<?php
/**
 * Page user_social_accounts - instagram tab
 * User: Zaitsev Sergei
 * Date: 05.03.2017
 * Time: 12:08
 */

use App\Http\Controllers\ManageUserInstagramAccountsController;
?>

<div id="evPanel4" class="tab-pane fade <?php if($_GET["account"] == "instagram") echo " in active"?>">
    <!-- Содержимое панели 4 -->
    {{-- <h3>Instagram accounts</h3> --}}
    <div class="panel-body">
        <div class="row new-socaccount-button-area">
            <div class="col-md-4 col-lg-offset-4">
                <form action="{{route('api.user_instagram')}}" method="get">
                    <fieldset class="fieldset-socnet">
                        <button type="submit" class="btn btn-primary btn-lg btn-custom-socnet">
                            Add new instagram account
                        </button>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="result_data_table">
            <?php echo ManageUserInstagramAccountsController::getInstagramData(); ?>
        </div>
    </div>
</div>
<!-- Modal to delete twitter account -->
<div class="modal fade" id="delete_instagram_account" tabindex="-1" role="dialog" aria-labelledby="delete_instagram_account">

</div>