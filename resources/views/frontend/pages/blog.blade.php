@extends('frontend.main')
@section('title','Home')
@section('content')

<!--start banner area-->
    <section class="banner-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="banner-left-txt text-light">
                        <h5>Parcel Delivered On Time Without Any Hassle</h5>
                        <p>Easily track your courier, Get courier within hours. Efficient & safe delivery.</p>
                        <a href="merchant.html" class="btn btn-danger mt-2 text-uppercase">Become A Marchant</a>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="banner-images">
                        <img src="{{ asset('public/frontend') }}/images/6948699_preview.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="tracking">
            <form action="#">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-3" style="font-size: 17px; font-weight: 600">TRACK YOUR CONSIGNMENT <small class="text-muted ml-2">Now you can easily track your consignment</small></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="Enter your tracking code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger btn-block text-light mt-2 mt-md-0" style="border: none; padding: 8px 10px"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--end banner area-->


    <!--start clients choose section-->
    <section class="client-choose-section clearfixpb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Why Hawlader Courier & Parcel Service</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_solution.svg" alt="One Stop Solution">
                            </div>
                            <div class="col-md-8">
                                <h5>One Stop Solution</h5>
                                <p>We understand how to make logistics work for our merchant partners. Our job is to let our partners focus on their core business while we take care of the rest.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_wide_cover.svg" alt="Wide Coverage">
                            </div>
                            <div class="col-md-8">
                                <h5>Wide Coverage</h5>
                                <p>We have a dedicated delivery channel of 350+ delivery agents in Dhaka and Chattogram. We have partnered with 50+ franchises all over the country as well.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_track.svg" alt="Full Tracking">
                            </div>
                            <div class="col-md-8">
                                <h5>Scalable Application</h5>
                                <p>Our All Application will Scalable for that our all application can manage huge user Traffic</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_delivey.svg" alt="Delivery confirmation with OTP">
                            </div>
                            <div class="col-md-8">
                                <h5>Central Customer Support</h5>
                                <p>We have also Dedicated Customer Support. Anybody can get support directly by Phone Call</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_truck_fast.svg" alt="Fastest Service">
                            </div>
                            <div class="col-md-8">
                                <h5>Expert Development Team</h5>
                                <p>We have Most Experienced, Expert and Dedicated Software development team.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="row">
                            <div class="b-img-embed col-md-4">
                                <img src="{{ asset('public/frontend') }}/images/icon_cash-hand.svg" alt="Cash on Delivery (COD)">
                            </div>
                            <div class="col-md-8">
                                <h5>Simple Pricing Model</h5>
                                <p>Our every product price model is so simple. For that client can easily understand our price model</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end clients choose section-->

    <!--start services section-->
    <section class="services-section clearfix py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="{{ asset('public/frontend') }}/images/door-to-door.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Door to Door Delivery</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="{{ asset('public/frontend') }}/images/real-time-tracking.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Real Time Tracking</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="{{ asset('public/frontend') }}/images/packaging.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Free Packaging</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="{{ asset('public/frontend') }}/images/customer-service.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Customer Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end services section-->

    <!--start faq section-->
    <section class="faq-section clearfix py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>FAQ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="faq-left-ac">
                        <div id="accordion" class="accordion">
                            <div class="card mb-0">
                                <div class="card-header collapsed   wow animate__animated animate__fadeInUp" data-toggle="collapse" href="#f1">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-1.png" alt="">
                                        What does it cost for a courier?

                                    </a>
                                </div>
                                <div id="f1" class="card-body collapse" data-parent="#accordion">
                                    <p>Costs for our courier and delivery services will vary based upon the size and weight of the item, what type of vehicle you require, how quickly you need the item delivered, and the distance from your pick up point and delivery point. For more please you can check our service charges.</p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f2">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-2.png" alt="">
                                        What is the largest package you can deliver?

                                    </a>
                                </div>
                                <div id="f2" class="card-body collapse" data-parent="#accordion">
                                    <p>For now, we only allow up to 3 kg. If you need to send a bigger parcel please contact us on 01825332325
                                    </p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f3">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-3.png" alt="">
                                        Do you provide packaging?

                                    </a>
                                </div>
                                <div id="f3" class="collapse" data-parent="#accordion">
                                    <div class="card-body">Yes, we provide packaging and it's completely free. You don't have to pay for this
                                    </div>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f4">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-4.png" alt="">
                                        D How can I track my goods/parcels?


                                    </a>
                                </div>
                                <div id="f4" class="collapse" data-parent="#accordion">
                                    <div class="card-body">Yes, we provide packaging and it's completely free. You don't have to pay for this
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-left-ac">
                        <div id="accordion2" class="accordion">
                            <div class="card mb-0">
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" href="#f5">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-5.png" alt="">
                                        When my goods are lost, What should I do?


                                    </a>
                                </div>
                                <div id="f5" class="card-body collapse" data-parent="#accordion2">
                                    <p>If we lost your goods you can fill up this form or you call us directly we will pay you the full amount of your goods.</p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion2" href="#f6">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-6.png" alt="">
                                        What is your delivery hour?

                                    </a>
                                </div>
                                <div id="f6" class="card-body collapse" data-parent="#accordion2">
                                    <p>we do delivery 7days a week and our delivery time is 10:00 AM to 6:00 PM
                                    </p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion2" href="#f7">
                                    <a class="card-title">
                                        <img src="{{ asset('public/frontend') }}/images/faq-7.png" alt="">
                                        What is your payment option?


                                    </a>
                                </div>
                                <div id="f7" class="collapse" data-parent="#accordion2">
                                    <div class="card-body">Once your order will be delivered. We will pay you on the next day through Bkash, Nagad, or Bank Transfer.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end faq section-->

    <!--start delivery charge section-->
    <section class="delivery-charge-section clearfix py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>See your delivery charge</h2>
                        <p>Take a look at how much it will cost to send a parcel.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav d-charges nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Inside City</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">City Suburb</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Outside City</a>
                        </li>
                    </ul>

                    <div class="tab-content   wow animate__animated animate__fadeInUp" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card-group text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳60</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>1 kg to 2 kg</p>
                                        <h5>৳75</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>2 kg to 3 kg</p>
                                        <h5>৳90</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>3 kg to 4 kg</p>
                                        <h5>৳105</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>4 kg to 5 kg</p>
                                        <h5>৳120</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-group text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳100 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳115 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳130 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳145 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳160 + 1% COD</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card-group text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳130 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳160 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳190 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳220 + 1% COD</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>Upto 1 kg</p>
                                        <h5>৳250 + 1% COD</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end delivery charge section-->

    <!--start blog section-->
    <section class="blogs-section clearfix py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">Abu Taleb</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> SEP 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">We are lunching our new business</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                     <li class="mr-2"><a href="#">Abu Taleb</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> SEP 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">New Agent Registration Program!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                     <li class="mr-2"><a href="#">Abu Taleb</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> SEP 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#"> Become a merchant you get better service get us!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">Abu Taleb</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> SEP 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">Now we are covarage hole bangladesh</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end blog section-->

    <!--start blog section-->
    <section class="clients-section clearfix py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Clients</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <h3><span class="counter">2.5</span><span> + millon</span></h3>
                        <p>Parcels Delivered</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <h3><span class="counter">45</span><span></span></h3>
                        <p>Districts Coverage</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <h3><span class="counter">500</span><span> +</span></h3>
                        <p>Delivery Agents</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <h3><span class="counter">25,000</span><span> +</span></h3>
                        <p>Registered Merchants</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end blog section-->


@endsection