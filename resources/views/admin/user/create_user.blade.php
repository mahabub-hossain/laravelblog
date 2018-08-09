@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Bootstrap WYSIHTML5
                                <small>Simple and fast</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            {!! Form::open(['url' => '/save-user','method'=>'post']) !!}
                            @include('include.message')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label><br>
                                    <input type="checkbox" name="status" id="status" value="1"
                                    @if(old('status')==1) checked @endif >Status
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ old('password') }}">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Passowrd</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm passowrd">
                                </div>

                                <div class="form-group">
                                    <label for="role">Select Role</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-lg-3">
                                           <label><input type="checkbox" name="roles[]" value="{{$role->id}}">{{$role->name}}</label>
                                        </div>
                                      @endforeach
                                    </div>

                                </div>


                            </div>

                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection