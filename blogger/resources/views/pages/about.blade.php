@extends('main')

@section('title', '| About')

@section('content')

<div style="background-image: url('/images/image1.png'); height : 600px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h1 class="mb-3 mb-md-0">About Us</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>"Creating ideas and building brands that truly matter to people"</p>
                            <div class="mouse">
                                <a href="#" class="mouse-icon">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container pt-4">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end"
                    style="background-image:url(images/log.jpg);">
                    {{-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center"> --}}
                    <span class="icon-play"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="row justify-content-start pt-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">All about my Blog</span>
                        {{-- <h2 class="mb-4">We give you the best articles you want.</h2> --}}
                        <p>“Travel isn’t always pretty. It isn’t always comfortable. Sometimes it hurts, it even breaks
                            your heart. But that’s okay. The journey changes you; it should change you. It leaves marks
                            on your memory, on your consciousness, on your heart, and on your body. You take something
                            with you. Hopefully, you leave something good behind.”</p>
                        <div class="tabulation-2 mt-4">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                <li class="nav-item mb-md-0 mb-2">
                                    <a class="nav-link active py-2" data-toggle="tab" href="#home1">Our Mission</a>
                                </li>
                                <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                    <a class="nav-link py-2" data-toggle="tab" href="#home2">Our Vision</a>
                                </li>
                            </ul>
                            <div class="tab-content bg-light rounded mt-2 pt-3">
                                <div class="tab-pane container p-0 active" id="home1">
                                    <em>Là một travel blogger chuyên về du lịch trong và ngoài nước, Mình luôn mong muốn
                                        thông qua chia sẻ kinh nghiệm của mình có thể giúp mọi người đi du lịch đây đó
                                        một cách dễ dàng hơn, giúp hiểu rõ hơn về văn hóa, khám phá địa danh mới chứ
                                        không chỉ đi để check-in sống ảo.</em>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home2">
                                    <em>"Sống một cuộc sống của người đam mê xê dịch dù còn nhiều khó khăn nhưng mình vui
                                        vẻ đón nhận tất cả mọi thứ như một phần tất yếu. Những trải nghiệm, con đường đã
                                        đi qua, những bạn bè đã gặp đều là trở thành một mảnh ghép trong bức tranh của
                                        cuộc đời. Mình hy vọng qua những bài chia sẻ sẽ khiến các bạn sẽ thêm yêu đất
                                        nước và con người mọi nơi hơn" </em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-4">All about me</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                {{-- <div class="carousel-testimony owl-carousel ftco-owl"> --}}
                    <div class="item">
                        <div class="testimony-wrap py-4 d-flex justify-content-center">
                            <div class="text">
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/log.jpg)"></div>
                                    <div class="pl-3 center">
                                        <p class="name">Đông Phan</p>
                                        <span class="position">Blog Manager</span>
                                    </div>
                                </div>
                                <p class="mb-4">
                                    "The person who created this blog site"</p>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
