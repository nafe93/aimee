@extends('spark::layouts.app')

@section('content')
<div class="spark-screen container">

    <!-- include left sidebar nav -->
    @include('dashboard.account-left-sidebar')

    <div class="">

        <!-- include top nav -->
        @include('dashboard.account-top-menu')

        <div class="">
            <div class="">
                <topics inline-template>
                    <create-topic inline-template>
                        <div class="panel panel-default">
                            <div class="panel-heading">New Topic</div>

                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    <!-- Name -->
                                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                                        <label class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input type="text" id="create-topic-name" class="form-control" name="name" v-model="form.name">

                                            <span class="help-block" v-show="form.errors.has('name')">
                                                @{{ form.errors.get('name') }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Create Button -->
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-6">
                                            <button type="submit" class="btn btn-primary"
                                                    @click.prevent="create"
                                                    :disabled="form.busy">

                                                Subscribe
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </create-topic>

                    <list-topics :user="user" :topics="topics" inline-template>
                        <div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Subscribed Topics</div>

                                <div class="panel-body">
                                    <table class="table table-borderless m-b-none">
                                        <thead>
                                        <th></th>
                                        <th>Topic</th>
                                        </thead>

                                        <tbody>
                                        <tr v-for="topic in topics">
                                            <!-- Topic Unsubscribe Button -->
                                            <td>
                                                <button class="btn btn-warning" @click="approveUnsubscribe(topic)"
                                                data-toggle="tooltip" title="Unsubscribe">
                                                {{--v-if="user.id !== topic.owner_id">--}}
                                                <i class="fa fa-times"></i>
                                                </button>
                                            </td>

                                            <!-- Topic Name -->
                                            <td>
                                                <div class="btn-table-align">
                                                    @{{ topic.name }}
                                                </div>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Topic Unsubscribe Modal -->
                            <div class="modal fade" id="modal-unsubscribe" tabindex="-1" role="dialog">
                                <div class="modal-dialog" v-if="unsubscribing">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            <h4 class="modal-title">
                                                Current Topics
                                            </h4>
                                        </div>

                                        <div class="modal-body">
                                            Are you sure you want to unsubscribe from topic "@{{ unsubscribing.name }}"?
                                        </div>

                                        <!-- Modal Actions -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                                            <button type="button" class="btn btn-warning" @click="unsubscribe" :disabled="unsubscribeForm.busy">
                                            Yes, Unsubscribe
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </list-topics>

                </topics>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="/home">Aimee</a>
                </p>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){

                    demo.initChartist();

                    $.notify({
                        icon: 'pe-7s-gift',
                        message: "Welcome to <b>Aimee</b>"

                    },{
                        type: 'info',
                        timer: 4000
                    });

                });
            </script>

        </footer>

    </div>
</div>
@endsection