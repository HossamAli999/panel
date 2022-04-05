@extends('layouts.master')

@section('content')
<div class="app-main__outer">
  <div class="app-main__inner">
<section class="vh-100 gradient-custom" style="border-radius: 20px; border: none; overflow: scroll;">  
    <div   style="background: url(k.jfif); background-size: cover;">
      <div class="row justify-content-center align-items-center"  >
         <div class="col-12 col-lg-9 col-xl-7">
           <div class="card shadow-2-strong card-registration" style="border-radius: 5px;margin-bottom: 20px; border: none;"> 
            <div class="headingProfilevehicle card-body p-4 p-md-5" style="background-color:#fafafa; box-shadow: 0px 0px 5px #ccc; border-radius: 20px; border: none; ">

          
     
  
      <div class="row" >
        {{-- <div class="col-lg">
          <div class="card mb-4"style="background-color: whitesmoke;">
            <div class="card-body text-center" >
              <img src="" alt="avatar" class="rounded-circle img-fluid" style="width: 125px; height: 125px;">
              <h5 class="my-3"></h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">lives in 6 october</p>
            
            </div>
          </div>
        
        </div> --}}
        <div class="col-lg">
          <div class="card mb-4"style="background-color: whitesmoke;">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"> License Plate:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$vehicle->licensePlate}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Model:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$vehicle->model}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Driver:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                  @if ($driver == Null)
                  driver is not assign yet.
                  @else
                  {{ $driver->name  }} 
                  @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Color:</p>
                </div>
                <div class="col-sm-9">
                  <input type="color" class="text-muted mb-0 " value="{{$vehicle->color}}" disabled>
                </div>
              </div>
            
        
   
            </div>
          </div>
      
        </div>
      </div>

        </div>
   
      </div>
   </div>
      </div>
   </div>
   @endsection
