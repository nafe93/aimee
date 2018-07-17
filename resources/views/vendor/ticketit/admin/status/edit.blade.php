@extends($master)
@section('page', trans('ticketit::admin.status-edit-title', ['name' => ucwords($status->name)]))

@section('content')
    <div class="wrapper">

        <!-- include left sidebar nav -->
        @include('dashboard.account-left-sidebar')

        <div class="main-panel">

            <!-- include top nav -->
            @include('dashboard.account-top-menu')

            <div class="content">
                <div class="container-fluid">
                    @include('ticketit::shared.header')
                    <div class="well bs-component">
                        {!! CollectiveForm::model($status, [
                                                    'route' => [$setting->grab('admin_route').'.status.update', $status->id],
                                                    'method' => 'PATCH',
                                                    'class' => 'form-horizontal'
                                                    ]) !!}
                        <legend>{{ trans('ticketit::admin.status-edit-title', ['name' => ucwords($status->name)]) }}</legend>
                        @include('ticketit::admin.status.form', ['update', true])
                        {!! CollectiveForm::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
