@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-offset-5">
                        <a class="center btn btn-success" href="{{route('role.create')}}">Add New</a>
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
                            <h3 class="box-title" style="color: darkgreen">Role Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Edit Option</th>
                                    <th>Delete Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td><a href="{{ route('role.edit',$role->id) }}"><span class="glyphicon glyphicon-edit btn btn-primary"></span></a></td>
                                        <td>
                                            <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('role.destroy',$role->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                                    if(confirm('Are you sure, You Want to delete this?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $role->id }}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }" ><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>

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