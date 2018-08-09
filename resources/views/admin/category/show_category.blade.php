@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-offset-5">
                        <a class="center btn btn-success" href="{{URL::to('/create-category')}}">Add New</a>
                    </div>
                    <h3 align="center" style="color: green">
                        <?php
                        $message = Session::get('message');
                        if(isset($message)){
                            echo $message;
                            Session::put('message','');

                        }
                        ?>
                    </h3>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="color: darkgreen">CategoryInformation</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Slug(s)</th>
                                    <th>Edit Option</th>
                                    <th>Delete Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allcategories as $category)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td><a href="{{URL::to('/edit-category/'.$category->id)}}"><span class="glyphicon glyphicon-edit btn btn-primary"></span></a></td>
                                        <td><a href="{{URL::to('/remove-category/'.$category->id)}}" onclick="return confirm('are you sure to delete!')"><span class="glyphicon glyphicon-trash btn btn-danger"></span></a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Slug(s)</th>
                                    <th>Edit Option</th>
                                    <th>Delete Option</th>
                                </tr>
                                </tfoot>
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