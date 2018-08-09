@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-offset-5">
                        @can('users.create',Auth::User())
                        <a class="center btn btn-success" href="{{URL::to('/create-user')}}">Add New</a>
                            @endcan
                     </div>



                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="color: darkgreen">User Information</h3>
                        </div>
                        @include('include.message')
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Assign Role</th>
                                    <th>Status</th>
                                    @can('users.update',Auth::User())
                                    <th>Edit Option</th>
                                    @endcan
                                        @can('users.delete',Auth::User())
                                    <th>Delete Option</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @foreach($user->roles as $user_role)
                                                {{$user_role->name}},
                                             @endforeach
                                        </td>
                                        <td>{{$user->status?'Active':'Inactive'}}</td>
                                        @can('users.update',Auth::User())
                                            <td><a href="{{URL::to('/edit-user/'.$user->id)}}"><span class="glyphicon glyphicon-edit btn btn-primary"></span></a></td>
                                        @endcan
                                        @can('users.delete',Auth::User())
                                            <td><a href="{{URL::to('/remove-user/'.$user->id)}}" onclick="return confirm('are you sure to delete!')"><span class="glyphicon glyphicon-trash btn btn-danger"></span></a></td>
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