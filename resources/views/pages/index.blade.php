
@extends('layout')

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="row">

                        @foreach($posts as $post)
                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-4" href="category.html">{{ $post->category->title }}</a>
                                        <span class="post-date">{{ $post->getDate() }}</span>
                                    </div>
                                    <h3 class="post-title"><a href={{ route('post.show', $post->slug) }}>{{ $post->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                        @endforeach


                    </div>
                    {{ $posts->links() }}
                </div>

                @include('pages._sidebar')
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection