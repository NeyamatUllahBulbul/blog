@extends('layouts.front.master')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 single-content">
                    <p class="mb-5">
                        <img src="{{asset($post->photo)}}" alt="Image" class="img-fluid">
                    </p>
                    <h1 class="mb-4">
                        {{$post->title}}
                    </h1>
                    <div class="post-meta d-flex mb-5">
                        <div class="bio-pic mr-3">
                            <img src="{{asset($post->author->photo)}}" alt="Image" class="img-fluidid">
                        </div>
                        <div class="vcard">
                            <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                            <span class="date-read">{{date('M d',strtotime($post->created_at))}}<span class="mx-1">&bullet;</span>{{$post->total_read}}<span class="icon-star2"></span></span>
                        </div>
                    </div>
                    <p>{{$post->details}}</p>
                    <div class="pt-5">
                        <p>Categories: <a href="#">Design</a>, <a href="#">Events</a> Tags: <a href="#">#html</a>, <a href="#">#trends</a></p>
                    </div>
                    <div class="pt-5">
                        <div class="section-title">
                            <h2 class="mb-5">6 Comments</h2>
                        </div>
                        <ul class="comment-list">
                            @foreach($comments as $comment)
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{asset('images/user.png')}}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe{{$comment->name}}</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>


                                    <!--Modal-->
                                    <button class="btn btn-primary" id="myBtn">Reply</button>
                                    <div id="myModal" class="modal">
                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <div class="comment-form-wrap pt-5">
                                                <form action="#" class="p-5 bg-light">
                                                    <div class="form-group">
                                                        <label for="message">Message</label>
                                                        <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary py-3">Send Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!--Modal End-->
                                </div>
                            </li>
                                @endforeach
                        </ul>

                        <div class="comment-form-wrap pt-5">
                            <div class="section-title">
                                <h2 class="mb-5">Leave a comment</h2>
                            </div>
                            <form action="{{route('comment.store')}}" method="post" class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <input name="post_id" type="hidden" value="{{$post->id}}">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" class="form-control" id="website">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary py-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto">
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
        </div>
    </div>
    <script>// Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }</script>
@endsection