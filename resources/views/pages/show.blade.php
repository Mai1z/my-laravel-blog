
@extends('layout')

@section('content')
    <!-- Page Header -->
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('{{ $post->getImage() }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="category.html">{{ $post->category->title }}</a>
                        <span class="post-date">{{ $post->getDate() }}</span>
                    </div>
                    <h1>{{ $post->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Post content -->
                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="main-post">
                            <p>{!! $post->content !!}</p>

                        </div>
{{--                        <div class="post-shares sticky-shares">--}}
{{--                            <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>--}}
{{--                            <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>--}}
{{--                            <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>--}}
{{--                            <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>--}}
{{--                            <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-envelope"></i></a>--}}
{{--                        </div>--}}
                    </div>

                    <!-- author -->
{{--                    <div class="section-row">--}}
{{--                        <div class="post-author">--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-left">--}}
{{--                                    <img class="media-object" src="{{ $post->author->getImage() }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="media-heading">--}}
{{--                                        <h3>{{ $post->author->name }}</h3>--}}
{{--                                    </div>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--                                    <ul class="author-social">--}}
{{--                                        <li><a href="#"><i class="fa fa-vk"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-github"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /author -->
                    @if(!$post->comments->isEmpty())
                    <!-- comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>{{ $post->comments->count() }} Comments</h2>
                        </div>

                        <div class="post-comments">

                            @foreach($post->comments as $comment)
                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ $comment->author->getImage() }}" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>{{ $comment->author->name }}</h4>
                                        <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p>{{ $comment->text }}</p>
                                </div>
                            </div>
                            <!-- /comment -->
                            @endforeach
                        </div>
                    </div>
                    <!-- /comments -->
                    @endif

                    @if(Auth::check())
                        <!-- reply -->
                        <div class="section-row">
                            <div class="section-title">
                                <h2>Leave a reply</h2>
                            </div>
                            <form class="post-reply" role="form" method="post" action="{{ route('comment') }}">
                            {{ csrf_field() }}
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input" name="message" placeholder="Message"></textarea>
                                        </div>
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /reply -->
                    @endif
                </div>
                <!-- /Post content -->

                <!-- aside -->
                @include('pages._sidebar')
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection