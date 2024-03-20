<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite( ['resources/css/app.css'])
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <p> {{date('l, F d, Y')}}</p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area">
                        <a href="index.html" class="logo">
                            <img src="{{Vite::image('logo.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="index.html"><span class="fa fa-home desktop-home"></span><span
                                class="mobile-show">Home</span></a></li>
                    <li><a href="#">Category</a></li>
                    <li><a>Post</a></li>
                </ul>
            </div>
        </nav>
    </section>
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
    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Flickr Images</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>Tag</h2>
                        <ul class="tag_nav">
                            <li><a href="#">Home</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <address>
                            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">Copyright &copy; 2045 <a href="index.html">NewsFeed</a></p>
        </div>
    </footer>
</div>
@vite(['resources/js/app.js']);
</body>
</html>
