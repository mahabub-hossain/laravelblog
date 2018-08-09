@extends('user.master')
<!-- @section('bg-img',Storage::disk('local')->URL($slug->image))
 -->
 @section('image',url('public/blogimage/'.$slug->image))
@section('title',$slug->title)
@section('subtitle',$slug->subtitle)

@section('main-content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=2131263743557637&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Created at-{{$slug->created_at->diffForHumans()}}</small>
                    {{--diffForHumans() is used for showing 2 days ago 4 days ago or hour age formate--}}

                        @foreach($slug->categories as $category)

                        <small class="pull-right" style="margin-right: 20px;">
                            {{--By Slug i am accessing post model in the post modal there is a realation with category and tag by categories method and tags method.--}}
                            <a style="color: #FFAE00" href="{{URL::to('/post/category/'.$category->slug)}}">{{$category->name}}</a>
                        </small>
                            @endforeach


                {!!htmlspecialchars_decode($slug->body) !!}
                <h3>Tag Clouds</h3>
                    @foreach($slug->tags as $tag)
                        <a href="{{URL::to('/post/tag/'.$tag->slug)}}"><small class="pull-left" style="margin-right: 20px; color: #FF0000">
                            {{--By Slug i am accessing post modal in the post modal there is a realation with category and tag by categories method and tags method.--}}
                            {{$tag->name}}
                        </small></a>
                    @endforeach
            </div>
                <div class="fb-comments" data-href="{{Request::url() }}" data-numposts="5"></div>
        </div>
        </div>
    </article>

@endsection
