@extends('layout.master')
@section('content')
    <div class="container">
        <div class=" md:w-3/4 lg:w-1/2 mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="{{asset('images/events/success.png')}}">
                </div>
            </div>
            <div class="my-8 px-8">
                <p class="my-3 w-fulltext-xs text-gray-600">
                    Your event; <span class="text-indigo-800">{{$event->name}}</span> was successfully created.  
                </p>
                <p class="mb-3">
                    <span>Event Status:</span>
                    @if ($event->approved == 1)
                        <span class="inline-flex items-center justify-center p-4 text-sm font-bold leading-none text-white bg-green-300 rounded-full">Approved</span>
                    @elseif(!$event->approved)
                        <span class="inline-flex items-center justify-center px-6 py-2 text-sm font-bold leading-none text-white bg-yellow-300 rounded-full">Pending</span>
                    @else
                        <span class="inline-flex items-center justify-center p-4 text-sm font-bold leading-none text-white bg-red-600 rounded-full">Declined</span>
                    @endif
                </p>
                @if ($event->inperson)
                    <p class="text-sm text-gray-600 my-1"> <span class="uil uil-map-marker text-lg"></span> {{$event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state}} </p>
                @endif
                @if($event->online)
                    <p class="text-sm text-gray-600 my-1"> {{$event->platform}} <span class="uil uil-link text-lg"></span> <a href="{{$event->link}}">{{$event->link}}</a> </p>
                @endif
                <p class="text-sm text-yellow-500 my-1"> <span class="uil uil-clock text-lg text-black"></span> {{\Carbon\Carbon::parse($event->start_date)->format('l')}}, {{date('h:i:s a', strtotime($event->start_time))}} EST</p>
            </div>
            @php
                $t = date('Ymd', strtotime($event->start_date)).'T'.date('his', strtotime($event->start_time)).'Z/'.date('Ymd', strtotime($event->end_date)).'T'.date('his', strtotime($event->end_time)).'Z';
            @endphp
            <div class="flex flex-col sm:flex-row px-4 my-20">
                <a href="#https://calendar.google.com/calendar/render?action=TEMPLATE&text={{$event->name}}&dates={{$t}}&ctz=America/New_York&details={{$event->description}}"
                    rel="noopenner noreferer"
                    target="_blank" 
                    id="gc"
                    class="uppercase text-center border sm:mr-2 mb-4 border-gray-600 focus:outline-none bg-primary text-white font-medium tracking-wider w-full sm:w-1/2 m-auto block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700"  aria-disabled="true">
                    Add to Calender
                </a>
                <a href="/" class="capitalize text-center border-2  sm:ml-2 mb-4 border-indigo-800 focus:outline-none bg-gray-100 text-black font-medium tracking-wider block w-full sm:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700 hover:text-white">
                    Return to Homepage
                </a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
    <script>
        $("#gc").click( function (event) {
            event.preventDefault();
            swal("Notice", "Event has to be approved first.");
        })
    </script>
@endsection