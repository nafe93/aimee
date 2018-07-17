@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i class="fa fa-picture-o"></i> Aviary </h2>
        </div>

        <p>
            <button onclick="return launchEditor(&quot;myimage&quot;, &quot;https://31.media.tumblr.com/d4411b4c0b41d9c7a73fbcdb1054cb5c/tumblr_n3fyfbZVud1tsaz7eo1_500.jpg&quot;);" class="btn btn-success"><i class="fa fa-magic"></i>Edit Photo
            </button>
        </p>

        <img id="myimage" src="https://31.media.tumblr.com/d4411b4c0b41d9c7a73fbcdb1054cb5c/tumblr_n3fyfbZVud1tsaz7eo1_500.jpg" width="250">

    </div>
    <script src="http://feather.aviary.com/js/feather.js"></script>
    <script>var featherEditor = new Aviary.Feather({
          apiKey: 'your-api-key',
          apiVersion: 3,
          theme: 'dark',
          tools: 'all',
          appendTo: '',
          onSave: function(imageID, newURL) {
            var img = document.getElementById(imageID);
            img.src = newURL;
          },
          onError: function(errorObj) {
            alert(errorObj.message);
          }
        });
        function launchEditor(id, src) {
          featherEditor.launch({
            image: id,
            url: src
          });
          return false;
        }
    </script>
@stop