@extends('frontend.main')
@section('title','Home Page')
@section('content')

    <!--start banner area-->
    <section class="banner-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="banner-left-txt text-light">
                        <h5>Parcel Delivered On Time with no Hassle</h5>
                        <p>Easily track your courier, Get courier within hours. Efficient & safe delivery.</p>
                        <div class="banner-search mt-5">
                            <div class="row">
                                <div class="col-md-8 search-padding1">
                                    <input type="text" class="form-control" placeholder="Enter your tracking code">
                                </div>
                                <div class="col-md-4 search-padding2">
                                    <button class="btn  bd btn-block text-light mt-2 mt-md-0" style="border: none; padding: 11px 10px"><i class="fa fa-search"></i> Track Result</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end banner area-->


    <!--start clients choose section-->
    <section class="client-choose-section clearfixpb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Why Dakbd</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_solution.svg" alt="One Stop Solution">
                        </div>
                        <div class="">
                            <h5>One Stop Solution</h5>
                            <p>We understand how to make logistics work for our merchant partners. Our job is to let our partners focus on their core business while we take care of the rest.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_wide_cover.svg" alt="Wide Coverage">
                        </div>
                        <div class="">
                            <h5>Wide Coverage</h5>
                            <p>We have a dedicated delivery channel of 350+ delivery agents in Dhaka and Chattogram. We have partnered with 50+ franchises all over the country as well.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_track.svg" alt="Full Tracking">
                        </div>
                        <div class="">
                            <h5>Scalable Application</h5>
                            <p>Our All Application will Scalable for that our all application can manage huge user Traffic</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_delivey.svg" alt="Delivery confirmation with OTP">
                        </div>
                        <div class="">
                            <h5>Central Customer Support</h5>
                            <p>We have also Dedicated Customer Support. Anybody can get support directly by Phone Call</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_truck_fast.svg" alt="Fastest Service">
                        </div>
                        <div class="">
                            <h5>Expert Development Team</h5>
                            <p>We have Most Experienced, Expert and Dedicated Software development team.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="client-box  wow animate__animated animate__fadeInUp">
                        <div class="b-img-embed">
                            <img src="https://ecourier.com.bd/wp-content/uploads/icon_cash-hand.svg" alt="Cash on Delivery (COD)">
                        </div>
                        <div class="">
                            <h5>Simple Pricing Model</h5>
                            <p>Our every product price model is so simple. For that client can easily understand our price model</p>
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
                            <img src="https://dropbd.com/public/lending_page/images/door-to-door.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Door to Door Delivery</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="https://dropbd.com/public/lending_page/images/real-time-tracking.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Real Time Tracking</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="https://dropbd.com/public/lending_page/images/packaging.png" alt="">
                        </div>
                        <div class="services-txt">
                            <h5>Free Packaging</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services-box text-center mb-3  wow animate__animated animate__fadeInUp">
                        <div class="services-image">
                            <img src="https://dropbd.com/public/lending_page/images/customer-service.png" alt="">
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
                                        <img src="https://dropbd.com/public/lending_page/images/faq-1.png" alt="">
                                        What does it cost for a courier?

                                    </a>
                                </div>
                                <div id="f1" class="card-body collapse" data-parent="#accordion">
                                    <p>Costs for our courier and delivery services will vary based upon the size and weight of the item, what type of vehicle you require, how quickly you need the item delivered, and the distance from your pick up point and delivery point. For more please you can check our service charges.</p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f2">
                                    <a class="card-title">
                                        <img src="https://dropbd.com/public/lending_page/images/faq-2.png" alt="">
                                        What is the largest package you can deliver?

                                    </a>
                                </div>
                                <div id="f2" class="card-body collapse" data-parent="#accordion">
                                    <p>For now, we only allow up to 3 kg. If you need to send a bigger parcel please contact us on 01825332325
                                    </p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f3">
                                    <a class="card-title">
                                        <img src="https://dropbd.com/public/lending_page/images/faq-3.png" alt="">
                                        Do you provide packaging?

                                    </a>
                                </div>
                                <div id="f3" class="collapse" data-parent="#accordion">
                                    <div class="card-body">Yes, we provide packaging and it's completely free. You don't have to pay for this
                                    </div>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion" href="#f4">
                                    <a class="card-title">
                                        <img src="https://dropbd.com/public/lending_page/images/faq-4.png" alt="">
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
                                        <img src="https://dropbd.com/public/lending_page/images/faq-5.png" alt="">
                                        When my goods are lost, What should I do?


                                    </a>
                                </div>
                                <div id="f5" class="card-body collapse" data-parent="#accordion2">
                                    <p>If we lost your goods you can fill up this form or you call us directly we will pay you the full amount of your goods.</p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion2" href="#f6">
                                    <a class="card-title">
                                        <img src="https://dropbd.com/public/lending_page/images/faq-6.png" alt="">
                                        What is your delivery hour?

                                    </a>
                                </div>
                                <div id="f6" class="card-body collapse" data-parent="#accordion2">
                                    <p>we do delivery 7days a week and our delivery time is 10:00 AM to 6:00 PM
                                    </p>
                                </div>
                                <div class="card-header collapsed  wow animate__animated animate__fadeInUp" data-toggle="collapse" data-parent="#accordion2" href="#f7">
                                    <a class="card-title">
                                        <img src="https://dropbd.com/public/lending_page/images/faq-7.png" alt="">
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

    <!--start clients section-->
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
                        <div class="box mx-auto d-flex justify-content-center mb-3 align-items-center"><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 258.75 245.75" xml:space="preserve" width="37" height="43">
                                <g transform="translate(0,1)">
                                    <circle cx="129.375" cy="60" r="60" fill="#1dc68c"></circle>
                                    <path fill="#1dc68c" d="m 129.375,136 c -60.061,0 -108.75,48.689 -108.75,108.75 h 217.5 C 238.125,184.689 189.436,136 129.375,136 Z"></path>
                                </g>
                            </svg></div>
                        <h3><span class="counter">12058</span><span>+ </span></h3>
                        <p>Our Happy Clients</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="box mx-auto d-flex justify-content-center mb-3 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-62 0 512 512.001" width="37" height="43">
                                <g fill-rule="evenodd">
                                    <path fill="#1dc68c" d="m342.234375 0h-81.003906c-24.804688 0-45 20.195312-45 45v26.992188h-23c-8.285157 0-15 6.71875-15 15 0 8.285156 6.714843 15 15 15h23.324219c3.816406 43.886718 40.664062 78.003906 85.175781 78.003906 47.21875 0 85.503906-38.285156 85.503906-85.503906 0-16.480469 0-32.996094 0-49.492188 0-24.804688-20.195313-45-45-45zm0 0"></path>
                                    <path fill="#1dc68c" d="m266.777344 217.53125c-10.945313 4.941406-20.667969 12.101562-28.574219 20.894531l-80.640625 82.570313h-112.5625c-24.78125 0-45 20.222656-45 45.003906 0 24.777344 20.222656 45 45 45h126.003906c13.824219 0 27.527344-3.472656 37.820313-13.839844l13.410156-13.5v113.332032c0 7.265624 5.160156 13.625 12.015625 15.007812l138.003906-.007812c8.273438-.007813 14.980469-6.722657 14.980469-15v-201.496094c0-61.597656-63.984375-103.453125-120.457031-77.964844zm0 0"></path>
                                    <path fill="#1dc68c" d="m41.226562 290.996094h108.003907c8.285156 0 15-6.714844 15-15v-107c0-8.285156-6.714844-15-15-15h-39v25.765625c0 8.285156-6.71875 15-15 15-8.285157 0-15-6.714844-15-15v-25.765625h-39.003907c-8.28125 0-15 6.714844-15 15v107c0 8.285156 6.71875 15 15 15zm0 0"></path>
                                </g>
                            </svg>
                        </div>
                        <h3><span class="counter">559</span><span>+</span></h3>
                        <p>Delivery Persons And Staffs</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="box mx-auto d-flex justify-content-center mb-3 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="37" height="43" viewBox="0 0 481.083 481.083" xml:space="preserve">
                                <g>
                                    <path fill="#1dc68c" d="M466.474,314.693c-7.675-3.647-21.885-6.894-46.002-1.642c-1.667,0.306-112.113,19.947-132.733,23.652    c-3.178,0.57-5.119,4.43-5.119,4.43c-40.774,62.781-105.437,17.883-105.142,16.967c36.45,10.105,67.417-3.995,79.028-17.938    c27.118-32.562-15.759-37.398-38.477-42.924c-85.094-20.693-88.682,0.514-137.964,5.199L4.522,313.136    c-1.712,0.519-3.128,1.734-3.899,3.349c-0.772,1.614-0.83,3.479-0.16,5.138l3.051,7.545c7.604,18.809,15.251,46.834,23.292,65.875    c0.517,1.227,1.407,2.262,2.544,2.957c0.252,0.154,0.589,0.344,1.011,0.545c1.508,0.717,3.208,1.143,4.595,1.141l53.686-1.061    c2.814-0.018,122.088,69.213,179.354,46.277l178.373-79.97c7.098-3.359,14.436-6.832,21.741-10.207    c7.973-3.683,12.927-12.146,12.972-20.372C481.129,325.753,475.685,319.07,466.474,314.693z"></path>
                                    <path fill="#1dc68c" d="M96.832,111.858h5.355v128.519c0,9.859,7.993,17.852,17.853,17.852h241.001c9.859,0,17.852-7.993,17.852-17.852V111.858    h5.356c4.931,0,8.927-3.997,8.927-8.926V40.451c0-4.93-3.996-8.926-8.927-8.926H96.832c-4.93,0-8.926,3.996-8.926,8.926v62.482    C87.906,107.861,91.901,111.858,96.832,111.858z M220.457,57.521h40.167c7.888,0,14.282,6.395,14.282,14.282    c0,7.888-6.396,14.281-14.282,14.281h-40.167c-7.887,0-14.281-6.394-14.281-14.281C206.175,63.916,212.569,57.521,220.457,57.521z    "></path>
                                </g>
                            </svg>
                        </div>
                        <h3><span class="counter">1,132</span><span>K+</span></h3>
                        <p>Parcels Delivered</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="client-counter-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="box mx-auto d-flex justify-content-center mb-3 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="37" height="43" viewBox="0 0 890.5 890.5" xml:space="preserve">
                                <g>
                                    <path fill="#1dc68c" d="M208.1,180.56l355-96.9l-18.8-38c-12.3-24.7-42.3-34.9-67-22.6l-317.8,157.5H208.1z"></path>
                                    <path fill="#1dc68c" d="M673.3,86.46c-4.399,0-8.8,0.6-13.2,1.8l-83.399,22.8L322,180.56h289.1h126l-15.6-57.2    C715.5,101.06,695.3,86.46,673.3,86.46z"></path>
                                    <path fill="#1dc68c" d="M789.2,215.56h-11.4h-15.5h-15.5H628.5H193.8h-57h-48h-8.9H50.1c-15.8,0-29.9,7.3-39.1,18.8c-4.2,5.3-7.4,11.4-9.2,18.1    c-1.1,4.2-1.8,8.6-1.8,13.1v6v57v494.1c0,27.601,22.4,50,50,50h739.1c27.601,0,50-22.399,50-50v-139.5H542.4    c-46.9,0-85-38.1-85-85v-45.8v-15.5v-15.5v-34.4c0-23,9.199-43.899,24.1-59.199c13.2-13.601,30.9-22.801,50.7-25.101    c3.3-0.399,6.7-0.6,10.1-0.6h255.2H813h15.5h10.6v-136.5C839.2,237.96,816.8,215.56,789.2,215.56z"></path>
                                    <path fill="#1dc68c" d="M874.2,449.86c-5-4.6-10.9-8.1-17.5-10.4c-5.101-1.699-10.5-2.699-16.2-2.699h-1.3h-1h-15.5h-55.9H542.4    c-27.601,0-50,22.399-50,50v24.899v15.5v15.5v55.4c0,27.6,22.399,50,50,50h296.8h1.3c5.7,0,11.1-1,16.2-2.7    c6.6-2.2,12.5-5.8,17.5-10.4c10-9.1,16.3-22.3,16.3-36.899v-111.3C890.5,472.16,884.2,458.959,874.2,449.86z M646.8,552.36    c0,13.8-11.2,25-25,25h-16.6c-13.8,0-25-11.2-25-25v-16.6c0-8,3.7-15.101,9.6-19.601c4.3-3.3,9.601-5.399,15.4-5.399h4.2H621.8    c13.8,0,25,11.199,25,25V552.36L646.8,552.36z"></path>
                                </g>
                            </svg>
                        </div>
                        <h3><span class="counter">1,357</span><span>M+</span></h3>
                        <p>Total Amount Paid</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end clients section-->

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
                            <img src="{{ asset('public/frontend') }}/images/blog-image.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">পাঠাও কার</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> সেপ্টেম্বর 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">এনলিস্টমেন্ট সার্টিফিকেট এর আবেদন করুন এখন-ই!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog-image.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">পাঠাও কার</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> সেপ্টেম্বর 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">এনলিস্টমেন্ট সার্টিফিকেট এর আবেদন করুন এখন-ই!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog-image.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">পাঠাও কার</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> সেপ্টেম্বর 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">এনলিস্টমেন্ট সার্টিফিকেট এর আবেদন করুন এখন-ই!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blogs-box mb-3  wow animate__animated animate__fadeInUp">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/blog-image.png" class="img-fluid" alt="image">
                            <div class="card-body">
                                <ul>
                                    <li class="mr-2"><a href="#">পাঠাও কার</a></li>
                                    <li><a href="#"><small><i class="fa fa-circle"></i> সেপ্টেম্বর 20, 2020</small></a></li>
                                </ul>
                                <h5><a href="#">এনলিস্টমেন্ট সার্টিফিকেট এর আবেদন করুন এখন-ই!</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end blog section-->


@endsection