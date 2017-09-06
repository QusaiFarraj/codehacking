@extends('layouts.blog-post')

@section('content')


    <h1>---</h1>

    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
        <p>{!! $post->body !!}</p>
        <hr>


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
                s.src = 'https://flamotechs.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        <script id="dsq-count-scr" src="//flamotechs.disqus.com/count.js" async></script>

        {{--@if(Session::has('comment_message'))--}}


            {{--<p class="alert-danger">{{session('comment_message')}}</p>--}}

        {{--@endif--}}


    {{--<!-- Blog Comments -->--}}

        {{--@if(Auth::check())--}}

        {{--<!-- Comments Form -->--}}
            {{--<div class="well">--}}
                {{--<h4>Leave a Comment:</h4>--}}


                {{--{!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}--}}

                {{--<input type="hidden" value="{{$post->id}}" name="post_id">--}}

                {{--<div class="form-group">--}}
                    {{--{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}--}}
                {{--</div>--}}

                {{--{!! Form::close() !!}--}}


            {{--</div>--}}

        {{--@endif--}}

        {{--<hr>--}}

        {{--<!-- Posted Comments -->--}}


        {{--@if(count($comments)>0)--}}


            {{--@foreach($comments as $comment)--}}

            {{--<!-- Comment -->--}}
                {{--<div class="media">--}}
                    {{--<a class="pull-left" href="#">--}}
                        {{--<img class="media-object" height="64" width="64" src="{{$comment->post->user->gravatar}}" alt="">--}}
                    {{--</a>--}}
                    {{--<div class="media-body">--}}
                        {{--<h4 class="media-heading">{{$comment->author}}--}}
                            {{--<small>{{$comment->created_at->diffForHumans()}}</small>--}}
                        {{--</h4>--}}
                        {{--<p>{{$comment->body}}</p>--}}

                    {{--@if(count($comment->replies) >0)--}}

                        {{--@foreach($comment->replies as $reply)--}}

                            {{--@if($reply->is_active == 1)--}}
                                {{--<!-- Nested Comment -->--}}
                                    {{--<div class="nested-comment media">--}}
                                        {{--<a class="pull-left" href="#">--}}
                                            {{--<img class="media-object" height="64" width="64" src="{{$reply->comment->post->user->gravatars}}"--}}
                                                 {{--alt="">--}}
                                        {{--</a>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">{{$reply->author}}--}}
                                                {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
                                            {{--</h4>--}}
                                            {{--{{$reply->body}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- End Nested Comment -->--}}

                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--@else--}}

                            {{--<h4>No replies to show</h4>--}}

                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="comment-reply-container">--}}

                        {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}

                        {{--<div class="comment-reply col-sm-6" style="display: none;">--}}

                            {{--Form for replies--}}
                            {{--{!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}--}}

                            {{--<input type="hidden" value="{{$comment->id}}" name="comment_id">--}}

                            {{--<div class="form-group">--}}
                                {{--{!! Form::textarea('body', null, ['class'=>'form-control','placeholder'=>'Reply here...', 'rows'=>1]) !!}--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}--}}
                            {{--</div>--}}

                            {{--{!! Form::close() !!}--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}

            {{--@endforeach--}}

        {{--@endif--}}

    {{--</div>--}}


@endsection


@section('scripts')

    <script>

        $('.comment-reply-container .toggle-reply').click(function () {

            $(this).next().slideToggle('slow');

        });

    </script>

@endsection