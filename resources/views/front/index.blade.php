@extends('layouts.front.master')
@section('content')
    <div class="site-section py-0">
        <div class="owl-carousel hero-slide owl-style">
            <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <div class="img-bg" style="background-image: url({{asset('assets/front/images/big_img_1.jpg')}})"></div>
                        <div class="contents">
                            <span class="caption">Editor's Pick</span>
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <div class="img-bg" style="background-image: url('images/big_img_1.jpg')"></div>
                        <div class="contents">
                            <span class="caption">Editor's Pick</span>
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>Editor's Pick</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-entry-1">
                                <a href="{{route('front.blog.show',$editors_pick[1]->id)}}"><img src="{{asset($editors_pick[1]->photo)}}" alt="Image" class="img-fluid"></a>
                                <h2><a href="{{route('front.blog.show',$editors_pick[1]->id)}}">{{$editors_pick[1]->title}}</a></h2>
                                <p>{{substr($editors_pick[1]->details,0,200)}}</p>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">{{$editors_pick[1]->author->name}}</a> in <a href="#">{{$editors_pick[1]->category->name}}</a></span>
                                    <span class="date-read">{{date('M d',strtotime($editors_pick[1]->created_at))}}<span class="mx-1">&bullet;</span> {{$editors_pick[1]->total_read}}<span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($editors_pick as $id=>$post)
                                @if($id > 1)
                                    <div class="post-entry-2 d-flex bg-light">
                                        <div class="thumbnail" style="background-image: url({{asset($post->photo)}})"></div>
                                        <div class="contents">
                                            <h2><a href="{{route('front.blog.show',$post->id)}}">{{$post->title}}</a></h2>
                                            <div class="post-meta">
                                                <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                                <span class="date-read">{{date('M d',strtotime($post->created_at))}}<span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2>Trending</h2>
                    </div>
                    @foreach($trending as $id=>$post)
                        @include('front.postsWIthoutImage')
                    @endforeach
                    <p>
                        <a href="#" class="more">See All Trends <span class="icon-keyboard_arrow_right"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="container">
            <div class="half-post-entry d-block d-lg-flex bg-light">
                <div class="img-bg" style="background-image: url({{asset($editors_pick[0]->photo)}})"></div>
                    <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2><a href="{{route('front.blog.show',$editors_pick[0]->id)}}">{{$editors_pick[0]->title}}</a></h2>
                        <p class="mb-3">{{substr($editors_pick[0]->details,0,250)}}</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">{{$editors_pick[0]->author->name}}</a> in <a href="#">{{$editors_pick[0]->category->name}}</a></span>
                            <span class="date-read">{{date('M d',strtotime($editors_pick[0]->created_at))}} <span class="mx-1">&bullet;</span> {{$editors_pick[0]->total_read}} <span class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                @foreach($featured_categories as $categories)
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h2>{{$categories->name}}</h2>
                        </div>
                        @foreach($categories->posts as $id=>$post)
                            @if($id < 2)
                                <div class="post-entry-2 d-flex">
                                    <div class="thumbnail" style="background-image: url({{asset($post->photo)}})"></div>
                                    <div class="contents">
                                        <h2><a href="{{route('front.blog.show',$post->id)}}">{{$post->title}}</a></h2>
                                        <p class="mb-3">{{substr($post->details,0,150)}}</p>
                                        <div class="post-meta">
                                            <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                            <span class="date-read">{{date('M d',strtotime($post->created_at))}} <span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2>Recent Posts</h2>
                    </div>
                    @foreach($recent_posts as $post)
                        <div class="post-entry-2 d-flex">
                            <div class="thumbnail order-md-2" style="background-image: url({{asset($post->photo)}})"></div>
                            <div class="contents order-md-1 pl-0">
                                <h2><a href="{{route('front.blog.show',$post->id)}}">{{$post->title}}</a></h2>
                                <p class="mb-3">{{substr($post->details,0,150)}}</p>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                    <span class="date-read">{{date('M d',strtotime($post->created_at))}}<span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3">
                    <div class="section-title">
                        <h2>Popular Posts</h2>
                    </div>
                    @foreach($popular_posts as $id=>$post)
                        @include('front.postsWIthoutImage')
                    @endforeach
                    <p>
                        <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="custom-pagination list-unstyled">
                        <li><a href="#">1</a></li>
                        <li class="active">2</li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection