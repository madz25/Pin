@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="{{$commercialspace->image1}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="{{$commercialspace->image2}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="{{$commercialspace->image3}}" alt="Third slide">
          </div>
          
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
</div>

<main role="main" class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row">
      <div class="col-md-8 blog-main">

        <div class="blog-post" style="padding-bottom: 5px;">
        <h1 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">{{$commercialspace->space_name}}</h1>

          <p style="font-family: Century Gothic; font-size: 20px"><i class="fa fa-map-marker" style="font-size:40px;color:red;"></i>  Tetuan, Don Alfaro St</p>

        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
          <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">About the space</h3>
          <p style="font-family: Century Gothic; font-size: 20px">{{$commercialspace->about_space}}</p>
          
        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
          <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">About the area</h3>
          <p style="font-family: Century Gothic; font-size: 20px">{{$commercialspace->about_area}}</p>
        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
            <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">Reviews</h3>
            <a class="btn btn-primary" href="/login" role="button">
                    Reviews
            </a>
          </div><!-- /.blog-post -->

      </div><!-- /.blog-main -->

      <aside class="col-md-4 blog-sidebar">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header bg-dark">
              <h4 class="my-0 font-weight-normal text-light" style="font-family: Century Gothic;">Rental Details</h4>
            </div>
            <div class="card-body">
              @if($commercialspace->status == "Unavailable")
                <h1 class="card-title pricing-card-title text-primary">&#8369;{{$commercialspace->price}} <small class="text-muted">/ {{$commercialspace->type}}</small></h1>
                <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 20px">
                <li><i class="fa fa-expand" style="font-size:18px;"></i> {{$commercialspace->sqm}} sqm</li>
                <li><i class="fa fa-bath" style="font-size:18px;"></i> {{$commercialspace->cr}} Bathroom</li>
                <li><i class="fa fa-info" style="font-size:18px;"></i> {{$commercialspace->status}}</li> 
                </ul>
              @else

                  <h1 class="card-title pricing-card-title text-primary">&#8369;{{$commercialspace->price}} <small class="text-muted">/ {{$commercialspace->type}}</small></h1>
                    <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 20px">
                    <li><i class="fa fa-expand" style="font-size:18px;"></i> {{$commercialspace->sqm}} sqm</li>
                    <li><i class="fa fa-bath" style="font-size:18px;"></i> {{$commercialspace->cr}} Bathroom</li>
                    <li><i class="fa fa-info" style="font-size:18px;"></i> {{$commercialspace->status}}</li> 
                  </ul>

                  <a class="btn btn-primary" href="/login" role="button">
                    Book a visit
                  </a>
              @endif
            </div>
          </div>
        </div>

        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header bg-dark">
              <h4 class="my-0 font-weight-normal text-light" style="font-family: Century Gothic;">Contact Us</h4>
            </div>
            <div class="card-body">
              <h3 class="card-title pricing-card-title text-primary">Owner: {{$commercialspace->owner_name}}</h3>
                <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 18px">
                <li>Email: {{$commercialspace->email}}</li>
                <li>Phone No: {{$commercialspace->mobile_no}}</li>
                <li>Tel No: {{$commercialspace->tel_no}}</li>
              </ul>
              
            </div>
          </div>
        </div>
      </aside><!-- /.blog-sidebar -->

      

    </div><!-- /.row -->

  </main><!-- /.container -->

  <div style="padding-top: 50px; padding-bottom: 50px;">
      <input type="text" value="{{$commercialspace->latitude}}" style="display: none;" id="lat">
      <input type="text" value="{{$commercialspace->longitude}}" style="display: none;" id="lng">
      <div style="width: 100%; height: 400px;" id="map"></div>
  </div>

  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

<script type="text/javascript">
  function initMap()
  {
      var myLatlng = new google.maps.LatLng($('#lat').val(),$('#lng').val());
      var mapOptions =
      {
          zoom: 18,
          center: myLatlng,
          scrollwheel:false
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          draggable: false
      });
  }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap"></script>
@endsection