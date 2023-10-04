@extends('layouts.app')
@push('css')
    <link href="{{ asset('themes/mytravel/dist/frontend/module/flight/css/flight.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("themes/mytravel/libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

    <style>
        .airplaneImage{
            max-width: 50px;
        }

        .carierCode{
            display: inline-flex;
            vertical-align: sub;
        }
        #flightFormBook{
            min-height: 450px;
            position: relative;
        }

        #flightFormBook #loader{
            background: url("{{ asset('images/loader.gif') }}");
            background-position: center;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
        .page-item{
            
        }
    </style>
@endpush
@section('content')
    <div class="bravo_search_flight">
        <div class="bg-gray-33 py-1">
            <div class="container">
                <div class="border-0">
                    <div class="card-body pl-0 pr-0">
                        @includeIf('Flight::frontend.layouts.search.form-search')
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @include('Flight::frontend.layouts.search.list-item')
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset("themes/mytravel/libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('themes/mytravel/module/flight/js/flight.js?_ver='.config('app.asset_version')) }}"></script>
    <script>
        $(document).ready(function () {
            $.BCoreModal.init('[data-modal-target]');
            var loader = $('#loader');

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
            var itemsPerPage = 9;

            function renderFlights(page, flightsData, searchId) {
                $('#totalNumberOfFlights').html(`${flightsData?.length} flights found`)
                var start = (page - 1) * itemsPerPage;
                var end = start + itemsPerPage;
                var flightsToShow = flightsData.slice(start, end);

                var flightList = $('#flightFormBook .row');
                flightList.empty();

                $.each(flightsToShow, function(index, flight) {
                    var totalDuration = flight?.itineraries[0]?.duration;
                    var newSagement = [];
                    var itineraries = flight?.itineraries[0]?.segments;

                    if (itineraries) {
                        itineraries.forEach((item) => {
                            var deptSeg = item?.departure?.iataCode;
                            var deptSegTime = item?.departure?.at;

                            if (item?.arrival) {
                                deptSeg += ` - `+item?.arrival?.iataCode;
                                deptSegTime += ` - `+item?.arrival?.at;
                            }

                            newSagement.push({
                                'airport_code': deptSeg,
                                'time': deptSegTime
                            });
                        });
                    }
                    var flightStops = "One Stop";
                    if (newSagement?.length > 1)
                    {
                        flightStops = "Multi Stops";
                    }

                    var flightItem = `<div class="col-md-6 col-xl-4">
                        <div class="card w-100 shadow-hover-3 mb-5">
                            <div class="card-body px-3 pt-0 pb-3 my-0 mx-1 border-bottom">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#" class="d-block mb-0 mt-4" tabindex="0">
                                            <img class="card-img-top airplaneImage mr-2" src="{{ asset('images/airplane.png') }}">
                                            <h3 class="carierCode">${flight?.validatingAirlineCodes}</h3>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right mt-4">
                                            <h6 class="font-weight-bold font-size-17 text-gray-3 mb-0">৳${flight?.price?.grandTotal * 120}</h6>
                                            <span class="font-weight-normal font-size-14 d-block text-color-1">{{__('avg/person')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray text-center text-dark mt-2">
                                    ${flightStops}    
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="border-bottom pb-3 mb-3 pt-3">
                                    <div class="px-3">
                                        <div class="d-flex mx-1">
                                            <i class="flaticon-aeroplane font-size-30 text-primary mr-3"></i>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-normal text-gray-5">
                                                    ${(newSagement?.length > 0)?newSagement[0]?.airport_code:''}
                                                </span>
                                                <span class="font-size-14 text-gray-1">
                                                    ${(newSagement?.length > 0)?formatDateRangeFormatter(newSagement[0]?.time):''}    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                        if (newSagement?.length > 1)
                        {
                            flightItem+=`
                                <div class="border-bottom pb-3 mb-3">
                                    <div class="px-3">
                                        <div class="d-flex mx-1">
                                            <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary mr-3"></i>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-normal text-gray-5">${newSagement[1]?.airport_code}</span>
                                                <span class="font-size-14 text-gray-1">${newSagement[1]?.time}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        }
                        
                        flightItem+=`
                                <div class="text-center font-size-14 text-primary mb-3">
                                    <!-- On Target Modal -->
                                    <a class="font-size-14 text-gray-1 d-none" href="#ontargetModal1" data-modal-target="#ontargetModal1" data-modal-type="ontarget" data-modal-effect="fadein" data-speed="500">{{__('Flight Details')}}</a>
                                    
                                    <!-- End On Target Modal -->
                                </div>
                                <div class="d-flex justify-content-center pl-3 pr-3">
                                    <a  href="{{ url('flight') }}/${searchId}/${flight?.id}"  class="btn btn-warning font-size-14 width-260 text-lh-lg transition-3d-hover py-1 btn-disabled">{{__("Book Flight")}}</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    flightList.append(flightItem);
                });
            }

            function renderPagination(flightsData, searchId) {
                var totalPages = Math.ceil(flightsData.length / itemsPerPage);
                var pagination = $('#pagination');
                pagination.empty();

                var ul = $('<ul>').addClass('pagination');

                for (var i = 1; i <= totalPages; i++) {
                    var li = $('<li>').addClass('page-item border');
                    var pageLink = $('<a>').addClass('page-link').attr('href', '#').text(i);
                    
                    pageLink.on('click', function(event) {
                        event.preventDefault();
                        var pageNumber = parseInt($(this).text());
                        renderFlights(pageNumber, flightsData, searchId);
                    });

                    li.append(pageLink);
                    ul.append(li);
                }

                pagination.append(ul);
            }
    
            // Check if a specific parameter exists
            if (queryParams.hasOwnProperty('from_where')) {
                var csrfToken = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ route("flight.search.api.call") }}',
                    type: 'GET',
                    data: queryParams,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token as a header
                    },
                    beforeSend: function() {
                        loader.show();
                    },
                    success: function(flightData) {
                        // Initial render
                        renderFlights(1, flightData.data, flightData.searchId);
                        renderPagination(flightData.data, flightData.searchId);
                        loader.hide('slow');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        loader.hide('slow');
                    }
                });
            }
        })
    </script>
@endpush
