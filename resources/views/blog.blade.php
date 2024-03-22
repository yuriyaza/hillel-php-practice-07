@extends('layout')
@section('blog')
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="left_content">
                    <div class="single_post_content">
                        <h2><span>Post and last comments</span></h2>
                        <div class="single_post_content_left">
                            <ul class="business_catgnav  wow fadeInDown">
                                <li>
                                    <figure class="bsbig_fig">
                                        <a href="pages/single_page.html" class="featured_img">
                                            <img alt="" src="{{Vite::image('featured_img1.jpg')}}"> <span class="overlay"></span>
                                        </a>
                                        <figcaption><a href="pages/single_page.html">{{$postTitle}}</a></figcaption>
                                        <p>{{$postContent}}</p>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                        <div class="single_post_content_right">
                            <ul class="spost_nav">
                                @foreach($commentsList as $comment)
                                    <li>
                                        <div class="media wow fadeInDown">
                                            <div class="media-left"><img alt="" src="{{Vite::image('post_img2.jpg') }}"></div>
                                            <div class="media-body">
                                                <h5 class="catg_title"> {{$comment['content']}}</h5>
                                                <p>{{date('d.m.Y H:i:s', strtotime($comment['updated_at']))
                                                }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
