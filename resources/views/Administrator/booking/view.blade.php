@extends('Administrator.master')

@section('content')

@section('title', 'Astrologer Booking | Management')

@section('astroCss')
    <style>
        .booking_fordata {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    font-size: 16px;
    margin-bottom: 15px;
}
.booking_fordata h6 {
    font-weight: 700;
    font-size: 16px;
}
.booking_fordata p {
    font-weight: 400;
    color: #837c7c;
    font-size: 16px;
}
    </style>
@endsection

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Astrologer Booking | Management
                    {{-- <small>new</small> --}}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Astrologer Booking</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="ttt-toast">
  @include('Administrator.Layouts.notify')
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-12">
                <h4>Nav Tabs inside Card Header <small>card-tabs / card-outline-tabs</small></h4>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-info card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Booking Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Customer Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Payment Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Astrologer Information</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <div class="row">

                            <div class="col-md-6 col-12">
                               <div class="booking_fordata">
                                <h6>Booking Number:</h6>
                                <p>{{$booking->booking_number}}</p>
                               </div>
                            </div>
                           
                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Booking Status</h6>
                                 <p>{{$booking->status}}</p>
                                </div>
                             </div>

                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Booking Date</h6>
                                 <p>{{$booking->service_date}}</p>
                                </div>
                             </div>

                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Booking Time</h6>
                                 <p>{{$booking->service_time}}</p>
                                </div>
                             </div>

                        </div>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="row">
                          
                            <div class="col-md-6 col-12">
                               <div class="booking_fordata">
                                <h6>First Name:</h6>
                                <p>{{$user_details->first_name}}</p>
                               </div>
                            </div>
                           
                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Last Name</h6>
                                 <p>{{$user_details->last_name}}</p>
                                </div>
                             </div>

                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Email</h6>
                                 <p>{{$user_details->email}}</p>
                                </div>
                             </div>

                             <div class="col-md-6 col-12">
                                <div class="booking_fordata">
                                 <h6>Mobile Number</h6>
                                 <p>{{$user_details->mobile_number}}</p>
                                </div>
                             </div>

                        </div>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                         Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                        <div class="row">
                          
                          <div class="col-md-6 col-12">
                             <div class="booking_fordata">
                              <h6>First Name:</h6>
                              <p>{{$astro_details->first_name}}</p>
                             </div>
                          </div>
                         
                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>Last Name</h6>
                               <p>{{$astro_details->last_name}}</p>
                              </div>
                           </div>

                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>Email</h6>
                               <p>{{$astro_details->email}}</p>
                              </div>
                           </div>

                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>Mobile Number</h6>
                               <p>{{$astro_details->mobile_number}}</p>
                              </div>
                           </div>
                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>Country Name</h6>
                               <p>{{$astro_details->userDetails->country_id}}</p>
                              </div>
                           </div>
                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>State Name</h6>
                               <p>{{$astro_details->userDetails->state_id}}</p>
                              </div>
                           </div>
                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>City Name</h6>
                               <p>{{$astro_details->userDetails->city_id}}</p>
                              </div>
                           </div>
                           <div class="col-md-6 col-12">
                              <div class="booking_fordata">
                               <h6>Pin Code</h6>
                               <p>{{$astro_details->userDetails->post_code}}</p>
                              </div>
                           </div>

                      </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div>
    </div>
</section>

@endsection