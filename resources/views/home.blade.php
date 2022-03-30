@extends('layouts.master')
@section('active1','mm-actj')
@section('content')
<head>


</head>
<div class="home_wrapper">
    <div class="info_section">
        <div class="typing">
            <div class="text">
                <span class="cursor type"></span>
            </div>
        </div>
        <div class="statistics">
            <div class="drivers" >
                <div class="number">
                    <span id="plus">+</span><span class="counter" data-target="{{  $countdriver }}">0</span>
                </div>
                <div class="label">
                    <div class="head">Drivers</div>
                    <div class="sublabel">In Service</div>
                </div>
            </div>
            <div class="buses">
                <div class="number">
                    <span id="plus">+</span><span class="counter" data-target="{{  $countvehicle }}">0</span>
                </div>
                <div class="label">
                    <div class="head">Buses</div>
                    <div class="sublabel">Ready To Go</div>
                </div>
            </div>
            <div class="parents" >
                <div class="number">
                    <span id="plus">+</span><span class="counter" data-target="{{  $countfather }}">0</span>
                </div>
                <div class="label">
                    <div class="head">Parents</div>
                    <div class="sublabel">Registered</div>
                </div>
            </div>
            <div class="children">
                <div class="number">
                    <span id="plus">+</span><span class="counter" data-target="{{ $countchild }}">0</span>
                </div>
                <div class="label">
                    <div class="head">Children</div>
                    <div class="sublabel">Being Picked</div>
                </div>
            </div>
        </div>
    </div>

    <div class="charts_section">
        <div class="main-card mb-3 card" style="display: inline-block; background-color: #f8f8f8;">
            <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <h5 class="card-title">Pie Chart</h5>
                <canvas id="pieChart"  style="display: block; width: 100%; height: 225px;" class="chartjs-render-monitor"></canvas>
            </div>
        </div>

        <div class="main-card mb-3 card" style="display: inline-block; background-color: #f8f8f8;">
            <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <h5 class="card-title">Line Chart</h5>
                <canvas id="lineChart" style="display: block; width: 100%; height: 225px;" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="alertg hide">
<span class='fas fa-check-circle'></span>
<span class="msg">{{ session('success') }}</span>
<div class="close-btn">
   <span class="fas fa-times"></span>
</div>
</div>
@endif  
<!-- landingPage.js  -->
<script src="{{ asset("js/landingPage.js") }}"></script>
        @endsection