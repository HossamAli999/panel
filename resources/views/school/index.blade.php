
@extends('layouts.master')

@section('content') 
<head>
    <link href="{{ asset("css/school.css") }}" rel="stylesheet">
</head>
<div class="schools_wrapper">
    @if ($school == NULL)
            <div class="joinSchool">
                <div class="joinSchool-title">Join School</div>
                <form class="joinShoolForm"  action="{{route('school.assignAdminToSchool')}} " method="POST"  enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                {{-- <form class="joinShoolForm"  action="{{route('home')}}" method="POST" >
                        @csrf --}}
                        {{-- @method('PUT') --}}
                    <div class="inputPart">
                        <input oninput="verifyCode()" id="SchoolCode" type="text" name="code" placeholder="#Code">
                    </div>
                    <div class="submitPart">
                        <button class="btn trackingBtn btnColor" id="joinSubmit" disabled="true" type="submit">Join</button>
                    </div>
                </form>
            </div>
            @if (session('code'))
            <div class="alert alert-danger" role="alert">
                {{ session('code') }}
            </div>
            @endif

            <div class="createSchool"> 
                <div class="createSchool-title">Add New School</div>
                <form action="{{route('school.store')}}" method="POST" class="createShoolForm" enctype="multipart/form-data">
                    @csrf
                    <div class="inputPart">
                        <input id="SchoolName" type="text" name="name" placeholder="School Name">
                        <input type="hidden" name="location" id="hiddenInput" value="">
                        <div id="location" name="location" class="btn red" onclick="getLocation()">Location</div>
                    </div>
                    <div class="submitPart">
                        <button class="btn trackingBtn btnColor" id="submit" disabled="true" type="submit">Create</button>
                    </div>
                </form>
            </div> 
    @else


    
      <div class="card" style="width: 90%;">
        <div class="card-body">
          <h5 class="card-title" style="color: #384850">{{$school->name}}<span class="card-code">#{{$school->code}}</span></h5>
          <!-- <h6 class="card-subtitle mb-2" style="color: #ffc107;">Secondary Schools</h6> -->
          <p class="card-map">MAP HERE</p>
          <div class="card-foot">
            {{-- <form action="{{route('driver.destroy',$drivers->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form> --}}
            <form action="{{route('school.left',$school->id)}}" method="POST">
                @csrf
                <button class="btn trackingBtn btnColor" style="margin-right: 10px" type="submit">
                    Left School
                </button>
            </form>
            <form action="{{route('school.destroy',$school->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn trackingBtn btnColor" style="margin-right: 10px" type="submit">
                    Delete
                </button>
            </form>
            <form action="" method="GET">
                <button class="btn trackingBtn btnColor" type="submit" onclick="">Update</button>
            </form>
          </div>
        </div>
    </div>
    @endif

    <!-- tracking.js  -->
    <script src=" {{ asset("js/school.js") }}"></script>
    <script>
        getLocation = () => {
                navigator.geolocation.getCurrentPosition(({coords: {latitude, longitude}}) => {
                    // console.log([latitude, longitude])
                    document.getElementById('hiddenInput').value = '' + [latitude, longitude]
                    document.getElementById('location').style.backgroundColor = 'green'
                    document.getElementById('location').innerHTML = 'Located'
                    document.getElementById('location').setAttribute('disabled', true)

                    let text1 = document.getElementById('SchoolName').value
                    // let text2 = document.getElementById('schoolLevel').value

                    if(text1 !== '')
                    document.getElementById('submit').disabled = false;
                }, 
                (error) => {
                    console.log(error)
                },{timeout:10000})
            }


            verifyCode = () => {
                let field = document.getElementById('SchoolCode').value

                if(field == '')
                document.getElementById('joinSubmit').disabled = true
                else
                document.getElementById('joinSubmit').disabled = false 
            }
    </script>
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

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
@endsection
