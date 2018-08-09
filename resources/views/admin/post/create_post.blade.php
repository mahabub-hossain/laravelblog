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
                        <p class="box-body pad">
                            <?php
                                if(count($errors)>0){
                                    foreach ($errors->all() as $error){?>
                                        <p class="alert alert-danger">{{$error}}</p>
                                    <?php }

                                }
                            ?>

                            {!! Form::open(['url' => '/save-post','method'=>'post','enctype'=>'multipart/form-data']) !!}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title">Post Title</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="subtitle">Sub Title</label>
                                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                                        </div>
                                        <div class="form-group">
                                            <label>Select tags</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                    multiple="" data-placeholder="SelectTag" style="width:
                                                    100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                                              @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Category"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">

                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                       <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="status" value="1">publish
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">File input</label>
                                            <input type="file" id="image" name="image">


                                        </div>
                                    </div>
                                    <textarea id="editor1" name="body"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                     </textarea>
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