@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-offset-5">
                        @can('posts.create',Auth::User())
                            <a class="center btn btn-success" href="{{URL::to('/create-post')}}">Add New</a>
                        @endcan

                    </div>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="color: darkgreen">Posts-Information</h3>
                            <h3 align="center" style="color: green">
                                <?php
                                $message = Session::get('message');
                                if(isset($message)){
                                    echo $message;
                                    Session::put('message','');

                                }
                                ?>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Title</th>
                                    <th>SubTitle</th>
                                    <th>Slug(s)</th>
                                    <th>CreatedAt</th>
                                    @can('posts.update',Auth::User())
                                    <th>Edit Option</th>
                                    @endcan
                                    @can('posts.delete',Auth::User())
                                    <th>Delete Option</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allposts as $post)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->subtitle}}</td>
                                        <td>{{$post->slug}}</td>
                                        <td>{{$post->created_at}}</td>
                                        @can('posts.update',Auth::User())
                                        <td><a href="{{URL::to('/edit-post/'.$post->id)}}"><span class="glyphicon glyphicon-edit btn btn-primary"></span></a></td>
                                        @endcan
                                        @can('posts.delete',Auth::User())
                                         <td><a href="{{URL::to('/remove-post/'.$post->id)}}" onclick="return confirm('are you sure to delete!')"><span class="glyphicon glyphicon-trash btn btn-danger"></span></a></td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.box -->
    </div>

@endsection