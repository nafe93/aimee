@if (count($errors) > 0)
    <div class="alert alert-danger">
        {{ trans('shared/errors.something-went-wrong') }}
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
