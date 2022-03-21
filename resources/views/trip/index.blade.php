

@extends('layouts.master')

@section('content')

<div class="tracking-wrapper">
    <div id="map" class="map">
        <img class="map-img" src="{{ asset("assets/images/tracking.svg") }}"/>
    </div>
        <div class="table">
            <div class="roow head_row">
                <div class="head_data">#</div>
                <div class="head_data">Driver</div>
                <div class="head_data">Status</div>
                <div class="head_data">Route</div>
            </div>
    
                
                <div class="roow">
                    <div class="tdata">1</div>
                    <div class="tdata">shehab</div>
                    <div class="tdata">
                        <div class="status"
                            style="">
                            active
                        </div>
                    </div>
                    <div class="tdata">
                        <button class="btn trackingBtn"
                            onclick="initPreview()">
                            <img src="{{ asset("assets/images/preview.png") }}" width="25px" height="25px">
                            Preview
                        </button>
                        <button class="btn trackingBtn btn_live"
                            onclick="initTrack()">
                            <img src="{{ asset("assets/images/tracking.png") }}" width="25px" height="25px">
                            <div class="text">
                                Live
                            <span class=""></span>
                            </div>
                        </button>
                    </div>
                </div>
            
        </div>

        <div class="createTrip">
            <form class="createTripForm" action="">
                <input oninput="verifyCreate()" id="location" type="text" placeholder="GeoFence Location">
                <button id="createTripSubmit" disabled="true" class="btn trackingBtn btnHover" type="submit">Create</button>
            </form>
        </div>

        <script>
            verifyCreate = () => {
                let field = document.getElementById('location').value

                if(field == '')
                document.getElementById('createTripSubmit').disabled = true
                else
                document.getElementById('createTripSubmit').disabled = false 
            }
        </script>
</div>

<!-- tracking.js  -->
<script src="{{ asset("js/tracking.js") }}"></script>
@endsection