@extends('layouts.master')

@section('content')

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" mb-4 ">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">Drivers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update Driver </li>
            </ol>
          </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-right headingUpdateDriver"></h4>
        </div>

        <div class="container bg-white">
            
            <div class="row  mt-5">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('upload/driver/'.$driver->image_path)}}"><span class="font-weight-bold">{{$driver->name}}</span><span class="text-black-50">{{$driver->email}}</span><span> </span></div>
                </div>
                <div class="col">
                        
                        <form action="{{route('driver.update',$driver->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="name" value="{{$driver->name}}"></div>
                            <div class="col-md-6"><label class="labels">License Number</label><input name="licenseNumber" type="text"  class="form-control" value="{{$driver->licenseNumber}}" placeholder="example@example.com"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Mobile</label><input type="text" name="mobileNumber" class="form-control"  value="{{$driver->mobileNumber}}"></div>
                            <div class="col-md-6"><label class="labels">School</label><input type="text"  name="school_id" class="form-control" value="{{$driver->school_id}}" ></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels  @error('email') is-invalid @enderror">Email</label><input type="text" name="email" class="form-control"  value="{{$driver->email}}"></div>
                            <div class="col-md-6"><label class="labels">Trip</label>
                              <select class="form-select" aria-label="Default select example" name="trip_id">
                          
                                @foreach($trips as  $trip )
                                          <option value="{{$trip->id}}"  @if( $trip->id == $driver->trip_id) selected @endif >{{$trip->geofence}}</option>
                                @endforeach
    
                              </select>
                              {{-- <input type="text"  name="trip_id" class="form-control" value="{{$driver->trip_id}}" > --}}
                            
                            
                            </div>
                        </div>
                        {{-- <div class="row mt-2"> --}}
                            {{-- <div class="col-md-6"> --}}
                                {{-- <label class="labels">Password</label> --}}
                                {{-- <input type="hidden" name="password" class="form-control"  value="{{$driver->password}}"></div> --}}
                            {{-- <div class="col-md-6"><label class="labels">Confirm Password</label><input type="Password"  name="password" class="form-control" value="" ></div> --}}
                        {{-- </div> --}}
                        <div class="row">
                            <div class="col-md-12 mb-4 d-flex align-items-center">
              
                              <div class="form-outline datepicker w-100">
                                <label for="image"  class="form-label">Photo</label>
          
                                <input
                                  type="file" name="image"
                                  class="form-control form-control-lg"
                                  id="image"
                                />
                              </div>
            
                            </div>
      
                           </div>
                       
                        <div class="my-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </form>
                        </div>
                        @if ($message = Session::get('error'))
                        @foreach($message as $messages)
                        <div class="alertr hide">
                          <span class='fas fa-exclamation-triangle'></span>
                          <span class="msg">{{$messages}}</span>
                          <div class="close-btn">
                             <span class="fas fa-times"></span>
                          </div>
                          </div> 
                        
                       @endforeach
                       @endif
               
                </div>
               
            </div>
        </div>
@endsection
