
<div class="col-md-4">

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Most Read</h2>
        </div>

        @foreach($popularPosts as $post)
        <div class="post post-widget">
            <a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
            <div class="post-body">
                <h3 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
            </div>
        </div>
        @endforeach

    </div>
    <!-- /post widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Featured Posts</h2>
        </div>
        @foreach($featuredPosts as $post)
        <div class="post post-thumb">
            <a class="post-img" href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-3" href="#">{{ $post->category->title }}</a>
                    <span class="post-date">{{ $post->getDate() }}</span>
                </div>
                <h3 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
            </div>
        </div>
        @endforeach

    </div>
    <!-- /post widget -->

    <!-- catagories -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Catagories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach($categories as $category)
                <li><a href="{{ route('category.show', $category->slug) }}" class="cat-1">{{ $category->title }}<span>{{ $category->posts()->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /catagories -->

    <!-- tags -->
    <div class="aside-widget">
        <div class="tags-widget">
            <ul>
                @foreach($tags as $tag)
                <li><a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /tags -->

</div>