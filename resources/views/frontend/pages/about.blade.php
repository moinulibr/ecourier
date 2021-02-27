@extends('frontend.main')
@section('title','About')
@section('content')
    <!--start about section-->
    <section class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text   wow animate__animated animate__fadeInUp">
                        <h5 class="mb-1">ABOUT US</h5>
                        <p class=" text-muted mb-5">Know about us more</p>
                        <p class="text-muted" style="font-size: 15px;">TL EXPRESS PARCEL & COURIER SERVICE IS ONE OF THE BEST FASTESTEST COMPANIES IN BANGLADESH. WE HANDLE TIME-CRITICAL PARCELS, DOCUMENTS AND OTHER GOODS BY OUR OWN CARGO BEFORE THE DEADLINES OF OUR CLIENTS. WE OFFER SAME DAY DELIVERY, ALL OF GOODS FOR CUSTOMER SATISFACTION.</p>
                    </div>
                    <div class="about-icon mt-5   wow animate__animated animate__fadeInUp">
                        <p><img class="mr-3" src="{{ asset('public/frontend') }}/images/icon-2.png" alt="icon">FAST DELIVERY</p>
                        <p><img class="mr-3" src="{{ asset('public/frontend') }}/images/icon-3.png" alt="icon">SECURED SERVICE</p>
                        <p><img class="mr-3" src="{{ asset('public/frontend') }}/images/icon-4.png" alt="icon">RELIABLE</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-txt-img text-center   wow animate__animated animate__fadeInUp">
                        <img src="{{ asset('public/frontend') }}/images/180-1807457_delivery-courier-dhl-express-service-e-commerce-cod.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="about-boxes card-body mb-3  wow animate__animated animate__fadeInUp">
                        <h5 class="mb-3 mt-1">RIGHT PLACE</h5>
                        <p class="text-muted">We go beyond delivering in and around a metro area. We deliver to rural towns, too. We remain committed to accuracy, transparency and getting it right the first time. We don’t just deliver shipments to the right address; we get them right to your end user.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-boxes card-body mb-3  wow animate__animated animate__fadeInUp">
                        <h5 class="mb-3 mt-1">RIGHT TIME</h5>
                        <p class="text-muted">Next day. Same day. Within the hour. 1st Choice delivers your packages on time and on your schedule.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-boxes card-body mb-3  wow animate__animated animate__fadeInUp">
                        <h5 class="mb-3 mt-1">RIGHT WAY</h5>
                        <p class="text-muted">When we ship on your behalf, we represent your business. That’s why our crew is always friendly, reliable and professional. That’s why we provide advanced technology, total transparency and seamless system integration</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end about section-->


@endsection