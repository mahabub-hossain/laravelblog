@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-offset-5">
                        <a class="center btn btn-success" href="{{route('permission.create')}}">Add New</a>
                    </div>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="color: darkgreen">Permission Information</h3>
                            @include('include.message')
                        </div>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Permission Name</th>
                                    <th>Permission For</th>
                                    <th>Edit Option</th>
                                    <th>Delete Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->for}}</td>

                                        <td><a href="{{route('permission.edit',$permission->id)}}"><span class="glyphicon glyphicon-edit btn btn-primary"></span></a></td>
                                        <td>
                                            <form id="delete-form-{{ $permission->id }}" method="post" action="{{ route('permission.destroy',$permission->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                                    if(confirm('Are you sure, You Want to delete this?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $permission->id }}').submit();
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