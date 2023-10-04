@extends('layouts.app')
@push('css')
    <link href="{{ asset('themes/mytravel/dist/frontend/module/flight/css/flight.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("themes/mytravel/libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

    <style>
        .max-width-820{
            max-width: 820px;
        }
    </style>
@endpush
@section('content')
    <div class="bravo_search_flight">
        <div class="bg-gray-33 py-1">
            <div class="container">

                <div class="row">
                    <div class="js-modal-window u-modal-window col-12 col-md-8 d-block">
                        <div class="card mx-4 mx-xl-0 mb-4 mb-md-0" style="">
                            <header class="card-header bg-light py-4 px-4">
                                <div class="row align-items-center text-center">
                                    <div class="col-md-auto mb-4 mb-md-0">
                                        <div class="d-block d-lg-flex flex-horizontal-center">
                                            <img src="https://mytravel.bookingcore.co/uploads/demo/flight/airline/img1.jpg" alt="Image-Description" class="img-fluid mr-3 mb-3 mb-lg-0 max-width-10" />
                                            <div class="font-size-14">Ida Gislason IV | VJ273</div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto mb-4 mb-md-0">
                                        <div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">
                                            <div class="mr-lg-3 mb-1 mb-lg-0"><i class="flaticon-aeroplane font-size-30 text-primary"></i></div>
                                            <div class="text-lg-left">
                                                <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">23:13</h6>
                                                <div class="font-size-14 text-gray-5">Mon, 09 Oct 23</div>
                                                <span class="font-size-14 text-gray-1">Nienowview</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto mb-4 mb-md-0">
                                        <div class="mx-2 mx-xl-3 flex-content-center flex-column">
                                            <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">6 hrs</h6>
                                            <div class="width-60 border-top border-primary border-width-2 my-1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto mb-4 mb-md-0">
                                        <div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">
                                            <div class="mr-lg-3 mb-1 mb-lg-0"><i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i></div>
                                            <div class="text-lg-left">
                                                <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">05:13</h6>
                                                <div class="font-size-14 text-gray-5">Tue, 10 Oct 23</div>
                                                <span class="font-size-14 text-gray-1">Port Pedro</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="card-body py-4 p-md-5">
                                <div class="row">
                                    <div class="col-12 border-bottom mb-3">
                                        <ul class="d-block d-md-flex justify-content-between list-group list-group-borderless list-group-horizontal list-group-flush no-gutters border-bottom">
                                            <li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
                                                <div class="font-weight-bold text-dark">Seat type</div>
                                                <span class="text-gray-1 text-capitalize">First Class</span>
                                            </li>
                                            <li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
                                                <div class="font-weight-bold text-dark">Baggage</div>
                                                <span class="text-gray-1 text-capitalize">adult</span>
                                            </li>
                                            <li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
                                                <div class="font-weight-bold text-dark">Check-in</div>
                                                <span class="text-gray-1">12 Kgs</span>
                                            </li>
                                            <li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
                                                <div class="font-weight-bold text-dark">Cabin</div>
                                                <span class="text-gray-1">6 Kgs</span>
                                            </li>
                                            <li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
                                                <div class="font-weight-bold text-dark">Price</div>
                                                <span class="text-gray-1">$10</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-lg-6 offset-lg-3">
                                        <div class="alert-text mt-3 text-left danger" style="display: none;"></div>
                                        <div class="min-width-250" style="display: none;">
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                <li class="d-flex justify-content-between py-2"><span class="font-weight-medium">Pay Amount</span> <span class="font-weight-medium"></span></li>
                                                <li class="d-flex justify-content-center py-2 font-size-17 font-weight-bold"><a class="btn btn-blue-1 font-size-14 width-135 text-lh-lg transition-3d-hover py-1 text-white">Book Now</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="js-modal-window u-modal-window col-12 col-md-4 d-block">
                        <div class="card mx-4 mx-xl-0 mb-4 mb-md-0" style="">
                            <header class="card-header bg-light py-2 px-4">
                                <h4>Customer Information</h4>
                            </header>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="container">
            {{-- @include('Flight::frontend.layouts.search.list-item') --}}
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset("themes/mytravel/libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('themes/mytravel/module/flight/js/flight.js?_ver='.config('app.asset_version')) }}"></script>
    <script>
        $(document).ready(function () {
            $.BCoreModal.init('[data-modal-target]');

            function formatDateRangeFormatter(dateRangeString)
            {
                // Split the date range into start and end dates
                var dateRange = dateRangeString.split(" - ");

                // Parse the start and end dates
                var startDate = new Date(dateRange[0]);
                var endDate = new Date(dateRange[1]);

                // Format the dates in a desired format (e.g., "Oct 6, 2023 11:45 AM - 2:05 PM")
                var formattedStartDate = startDate.toLocaleString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });
                var formattedEndDate = endDate.toLocaleString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });

                // Combine the formatted dates
                var formattedDateRange = formattedStartDate + " - " + formattedEndDate;
                return formattedDateRange;
            }

            function getQueryParams() {
                var queryParams = {};
                var queryString = window.location.search.substring(1);
                var params = queryString.split('&');
                
                for (var i = 0; i < params.length; i++) {
                    var param = params[i].split('=');
                    var key = decodeURIComponent(param[0]);
                    var value = decodeURIComponent(param[1]);
                    queryParams[key] = value;
                }
                
                return queryParams;
            }

            var queryParams = getQueryParams();
            console.log(queryParams);
        })
    </script>
@endpush
