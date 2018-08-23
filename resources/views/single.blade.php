@extends('layouts.frontend')

@section('content')

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
    <h1 class="stunning-header-title">{{ $post->title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                <a href="#" class="post__author-link">{{ $post->user->name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                            <a href="{{ route('category', ['id' => $post->category->id ]) }}">{{$post->category->name}}</a>
                                
                            </span>

                        </div>

                        <div class="post__content-info">

                            {{-- <p class="post__subtitle">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore.
                            </p> --}}

                            <p class="post__text">{{ $post->content }}
                            </p>

                            {{-- <div class="testimonial-item quote-left">

                                <h5 class="h5 testimonial-text">
                                    Mirum est notare quam littera gothica, quam nunc putamus parum claram,
                                    anteposuerit litterarum formas humanitatis placerat facer possim assum.
                                </h5>

                                <div class="author-info-wrap table">
                                    <div class="author-info table-cell">
                                        <h6 class="author-name c-primary">Angelina Johnson</h6>
                                        <div class="author-company">Envato Market</div>
                                    </div>
                                </div>

                                <div class="quote">
                                    <i class="seoicon-quotes"></i>
                                </div>

                            </div>

                            <p class="post__text">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                                feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                praesent luptatum quam nunc putamus parum claram, anteposuerit litterarum formas.
                            </p>

                            <h4 class="mb30">Qum Soluta Nobis Eleifend</h4>

                            <p class="post__text">Iriure dolor in hendrerit in vulputate velit esse molestie consequat,
                                vel illum dolore eu feugiat <span class="c-dark">nulla facilisis at vero eros</span>
                                et accumsan et iusto odio dignissim qui blandit praesent luptatum quam nunc putamus parum claram.
                            </p>

                            <ul class="list list--secondary">
                                <li>
                                    <i class="seoicon-check"></i>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                        nonummy nibh <span class="c-primary">euismod tincidunt;</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="seoicon-check"></i>
                                    <a href="#">Mirum est notare quam littera gothica;</a>
                                </li>
                                <li>
                                    <i class="seoicon-check"></i>
                                    <a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                        molestie consequat, vel illum dolore eu feugiat nulla;
                                    </a>
                                </li>
                                <li>
                                    <i class="seoicon-check"></i>
                                    <a href="#">Investigationes demonstraverunt lectores.</a>
                                </li>
                            </ul>

                            <p class="post__text">Quis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent quam nunc putamus parum claram.
                            </p> --}}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                    @foreach($post->tags as $tag)
                                       <a href="#" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">Share:
                        <a href="#" class="social__item">
                            <i class="seoicon-social-facebook"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-twitter"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-linkedin"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-google-plus"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-pinterest"></i>
                        </a>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img width="40px" height="40px" src="\{{$post->user->profile->avatar}}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }} </h5>
                            <p class="author-info"></p>
                        </div>
                        <p class="text">{{ $post->user->profile->about }}
                        </p>
                        <div class="socials">

                            <a href="{{ $post->user->profile->facebook }}" class="social__item">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="{{ $post->user->profile->youtube }}" class="social__item">
                                <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/google.svg') }}" alt="google">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">
                    @if($next)
                    <a href="{{ route('post.single', ['slug' => $next->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ $next->title }}</p>
                        </div>
                    </a>
                    @endif
                    
                    @if($prev)
                    <a href="{{ route('post.single', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ $prev->title }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                           <div class="disqus">
									<div id="disqus_thread"></div>
										<script>

										/**
										*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
										*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
										/*
										var disqus_config = function () {
										this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
										this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
										};
										*/
										(function() { // DON'T EDIT BELOW THIS LINE
										var d = document, s = d.createElement('script');
										s.src = 'https://facework-com-ng.disqus.com/embed.js';
										s.setAttribute('data-timestamp', +new Date());
										(d.head || d.body).appendChild(s);
										})();
										</script>
										<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
								</div>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach($tags as $tag)
                        <a href="#" class="w-tags-item">{{ $tag->tag }}</a>

                            @endforeach
                            
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>


@endsection
