
@extends('layouts.master')

@section('content')
<head>
    <link href="{{ asset("css/school.css") }}" rel="stylesheet">
</head>
<div class="schools_wrapper">
    
    <div class="joinSchool">
        <div class="joinSchool-title">Join School</div>
        <form  class="joinShoolForm"  action="/dash/data" method="POST">
            <div class="inputPart">
                <input oninput="verifyCode()" id="SchoolCode" type="text" name="schoolCode" placeholder="#Code">
            </div>
            <div class="submitPart">
                <button class="btn trackingBtn btnColor" id="joinSubmit" disabled="true" type="submit">Join</button>
            </div>
        </form>
    </div>


    <div class="createSchool">
        <div class="createSchool-title">Add New School</div>
        <form  class="createShoolForm"  action="/dash/data" method="POST">
            <div class="inputPart">
                <input id="SchoolName" type="text" name="schoolName" placeholder="School Name">
                <input id="schoolLevel" type="text" name="school-level" placeholder="School level">
                <div id="location" class="btn red" onclick="getLocation()">Location</div>
                <input type="hidden" name="location" id="hiddenInput" value="">
            </div>
            <div class="submitPart">
                <button class="btn trackingBtn btnColor" id="submit" disabled="true" type="submit">Create</button>
            </div>
        </form>
    </div>


    <div class="card" style="width: 90%;">
        <div class="card-body">
          <h5 class="card-title" style="color: #384850">fh<span class="card-code">#3434453</span></h5>
          <h6 class="card-subtitle mb-2" style="color: #ffc107;">Secondary Schools</h6>
          <p class="card-map">MAP HERE</p>
          <div class="card-foot">
            <form action="" method="POST">
                <button class="btn trackingBtn btnColor" style="margin-right: 10px" type="submit">Delete</button>
            </form>
            <form action="" method="GET">
                <button class="btn trackingBtn btnColor" type="submit" onclick="">Update</button>
            </form>
          </div>
        </div>
      </div>

    

    <!-- tracking.js  -->
    <script src="/Public/js/school.js"></script>
    <script>
        getLocation = () => {
                navigator.geolocation.getCurrentPosition(({coords: {latitude, longitude}}) => {
                    console.log([latitude, longitude])
                    document.getElementById('hiddenInput').value = '' + [latitude, longitude]
                    document.getElementById('location').style.backgroundColor = 'green'
                    document.getElementById('location').innerHTML = 'Verified'
                    document.getElementById('location').setAttribute('disabled', true)

                    let text1 = document.getElementById('SchoolName').value
                    let text2 = document.getElementById('schoolLevel').value

                    if(text1 && text2 !== '')
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
@endsection
