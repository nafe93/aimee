@extends($master)
@section('page', trans('ticketit::admin.priority-create-title'))

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
                        {!! CollectiveForm::open(['route'=> $setting->grab('admin_route').'.priority.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                            <legend>{{ trans('ticketit::admin.priority-create-title') }}</legend>
                            @include('ticketit::admin.priority.form')
                        {!! CollectiveForm::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
