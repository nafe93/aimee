<?
    use Illuminate\Support\Facades\Storage;

    
?>

<spark-update-profile-photo :user="user" inline-template>
    <div>
        <div class="panel panel-default" v-if="user">
            <div class="panel-heading">{{ trans('settings/profile/update-profile-photo.profile-photo') }}</div>

            <div class="panel-body">
                <div class="alert alert-danger" v-if="form.errors.has('photo')">
                    @{{ form.errors.get('photo') }}
                </div>

                <form class="form-horizontal" role="form">
                    <!-- Photo Preview-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <span role="img" class="profile-photo-preview"
                                :style="previewStyle">
                            </span>
                        </div>
                    </div>
                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <img  id="Avatar" src="" height="200" width="200" alt="">
                            <label  style="position: relative; top:75px" type="button" class="btn btn-primary btn-upload" :disabled="form.busy">
                                <span>{{ trans('settings/profile/update-profile-photo.select-new-photo') }}</span>

                                <input id="Img" v-el:photo type="file" class="form-control" name="photo" @change="update">
                            </label>
                            <button style="position: relative; top:75px" type="submit" class="btn btn-primary"
                                    @click.prevent="update"
                                    :disabled="form.busy">

                                {{ trans('settings/profile/update-contact-information.update') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</spark-update-profile-photo>
<script>
    // var img_source = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==";
   
    var x = "<?php $result = DB::table('users')->where('id', '=', Auth::id())->first(); echo Storage::url($result->photo_url);?>";
    var img_source = x.replace('/storage/','');
    
    console.log(img_source);

    $("#Avatar").attr('src', img_source);

    $(function(){
        $("#Img").on('change',function(){
            previewFile();
        });
    });

    function previewFile()
    {
        //var preview = document.querySelector('img');
        //var file    = document.querySelector('input[type=file]').files[0];
        var preview = document.getElementById('Avatar');
        var file    = document.getElementById('Img').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            console.log(reader.result);
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

</script>
<style>
    img[src=""] {
        content:url("data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==");
    }
    #Avatar{
        border-radius: 50%;
        float: left;
        display: block;
        margin: auto;
        position: relative;
        background: #00bbff;
    }
</style>