@extends('main')

@section('title', '| Contact')
@section('content')
<div style="background-image: url('/images/image1.png'); height : 600px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h1 class="mb-4 mb-md-0">Contact Us</h1>
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

<div class="container pt-4">
    {{-- <div class="container pt-3"> --}}
    <p>Là một travel blogger, Mình dành nhiều thời gian để xê dịch, chụp ảnh và viết lách.</p>
    <p>Nếu bạn có nhu cầu hợp tác cùng với mình theo phương diện đối tác hay cộng tác viên, mình rất vui được nhận thông tin từ bạn.
    </p>
    <em>As a travel blogger, I spend most of my time on traveling, photography and writing.</em>
    <em>Should you have any queries to cooperate with me as business partner or freelance contributor, please don’t hesitate to contact me.</em>
    {{-- </div> --}}
    <hr>
    <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
        </div>
        <div class="container">
            <blockquote>
                <strong>
                    <p>Address :</span> 28 Nguyen Tri Phuong St, Phu Hoi Ward, Hue City</p>
                </strong>

                <strong>
                    <p>Phone : +84 123 456 789 </p>
                </strong>

                <strong>
                    <p>Email : dongdontcare@outlook.com</p>
                </strong>
            </blockquote>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="name">Your Name:</label>
                    <input id="name" name="name" class="form-control">
                    @error('name')
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label name="email">Your Email:</label>
                    <input id="email" name="email" class="form-control">
                    @error('email')
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                    @error('subject')
                    <p class="text-danger">{{ $errors->first('subject') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control"
                        placeholder="Type your message here..."></textarea>
                    @error('message')
                    <p class="text-danger">{{ $errors->first('message') }}</p>
                    @enderror
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection
