@extends('user.master')
@section('image',asset('public/blogimage/1533750691.jpg'))
@section('title','My post Title')
@section('subtitle','Learn Together')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection
@section('main-content')
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-md-10 mx-auto">

                <posts title='title'></posts>
                @foreach($posts as $post)
               <div class="post-preview">
                   <a href="{{URL::to('/post/'.$post->slug)}}">
                       <h2 class="post-title">
                           {{$post->title}}
                      </h2>
                       <h3 class="post-subtitle">
                          {{$post->subtitle}}
                        </h3>
                  </a>
                   <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>

                      {{$post->created_at->diffForHumans()}}
                       <small></small>
                       <!-- <a href=""><i class="fa fa-thumbs-up"></i></a> -->
                   </p>
               </div>
             <hr>
               @endforeach

                <!-- Pager -->
                <div class="clearfix">
                    {{$posts->links()}}

                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer')

<!--     <script src="{{asset('public/js/app.js')}}"></script>
 -->
    @endsection