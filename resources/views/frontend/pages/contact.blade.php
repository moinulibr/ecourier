@extends('frontend.main')
@section('title','Contact')
@section('content')

     <!--start contact section-->
    <section class="contact-us py-5">
        <div class="container">
            <div class="contact-us-box bg-white p-sm-5">
                <style>
                    .contact-us-form form .form-control {
                        padding: 1.3rem .75rem;
                        border-radius: 2px;
                        background: #f1f1f1;
                        border: none;
                    }

                    .contact-us .section-title2 h2::after {
                        width: 100%;
                    }

                    .contact-us-details {
                        border-left: 1px solid #ddd;
                        padding: 15px;
                    }

                    .ad-icons {
                        height: 40px;
                        width: 40px;
                        line-height: 40px;
                        font-size: 18px;
                        text-align: center;
                        border-radius: 50%;
                        color: #fff;
                    }

                    .office-address .ad-hotline {

                        background: #42b6ff;
                    }

                    .office-address .ad-phone {
                        background: #0a0;
                    }

                    .office-address .ad-email {
                        background: #f95732;
                    }

                    .office-address {
                        font-size: 15px;
                    }

                </style>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-us-form">
                            <div class="contact-form">
                                <h5 class="mb-3 font-weight-bold">GET IN TOUCH</h5>
                                <form id="contactUs" method="post">


                                    <input class="form-control mb-3" type="text" name="name" placeholder="Name">

                                    <input class="form-control mb-3" type="text" name="phone" placeholder="Phone">

                                    <input class="form-control mb-3" type="text" name="email" placeholder="Email">

                                    <input class="form-control mb-3" type="text" name="subject" placeholder="Subject">

                                    <textarea class="form-control mb-3" name="message" placeholder="Your message" rows="5"></textarea>

                                    <button class=" btn btn-primary mt-2" style="font-size: 14px;"><i class="fa fa-paper-plane mr-1"></i>SEND MESSAGE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-us-details mt-4 mt-md-0">
                            <div class="office-address mb-5">
                                <p style="font-size: 16px;"><strong>Bangladesh (Head Office) :</strong></p>
                                <p>House # 63, Road # 13, Sector # 10, Uttara, Dhaka-1230, Bangladesh.</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Hotline - +8801755430927</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - +8801755430927</p>

                                <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - imranahmed.developer@gmail.com</p>
                            </div>
                            <div class="office-address mb-5">
                                <p style="font-size: 16px;"><strong>USA (Branch Office):</strong></p>
                                <p>House # 63, Road # 13, Sector # 10, Uttara, Dhaka-1230, Bangladesh.</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Hotline - +8801755430927</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - +8801755430927</p>

                                <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - imranahmed.developer@gmail.com</p>
                            </div>
                            <div class="office-address mb-5">
                                <p style="font-size: 16px;"><strong>Australia (Branch Office):</strong></p>
                                <p>House # 63, Road # 13, Sector # 10, Uttara, Dhaka-1230, Bangladesh.</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Hotline - +8801755430927</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - +8801755430927</p>

                                <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - imranahmed.developer@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contact section-->


@endsection