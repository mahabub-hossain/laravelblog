@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- /.box -->

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body pad">

                            {!! Menu::render() !!}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    {{--@push('scripts')--}}
        {{--{!! Menu::scripts() !!}--}}
    {{--@endpush--}}
@endsection
