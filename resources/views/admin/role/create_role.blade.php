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

                            {!! Form::open(['route' => 'role.store','method'=>'post']) !!}

                                <?php
                                if(count($errors)>0){
                                foreach ($errors->all() as $error){?>
                                <p class="alert alert-danger">{{$error}}</p>
                                <?php }

                                }

                          ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Role Name">
                                </div>
                             </div>
                             <div class="row">
                                     <div class="col-lg-4">
                                     @foreach($permissions as $permission)
                                         @if($permission->for == 'post')

                                         <div class="checkbox">
                                             <label><input type="checkbox" class="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                                         </div>


                                     @endif
                                     @endforeach
                                     </div>

                                <div class="col-lg-4">
                                    @foreach($permissions as $permission)
                                        @if($permission->for == 'user')

                                            <div class="checkbox">
                                                <label><input type="checkbox" class="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                                            </div>


                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-lg-4">
                                    @foreach($permissions as $permission)
                                        @if($permission->for == 'other')

                                            <div class="checkbox">
                                                <label><input type="checkbox" class="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                                            </div>


                                        @endif
                                    @endforeach
                                </div>
                           </div>
                   </div>
                    </div>
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