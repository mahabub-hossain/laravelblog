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

                            {!! Form::open(['url' => '/update-tag/'.$tag->id,'method'=>'post']) !!}
                            <h3 align="center" style="color: green">
                                <?php
                                $message = Session::get('message');
                                if(isset($message)){
                                    echo $message;
                                    Session::put('message','');

                                }
                                ?>
                            </h3>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Post Title</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"  value="{{$tag->slug}}">
                                </div>
                            </div>

                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">update</button>
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