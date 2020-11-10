<!DOCTYPE html>
<html lang="en">

<head>
    @include('include_lib.lib_css')
    @include('include_lib.css_for_table')
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        /* #map {
            height: 80%;
        } */
        /* Optional: Makes the sample page fill the window. */
        /* html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        } */

        .form-group {
            margin: 10px;
        }

        #banner-address {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 70%;
            height: 40px;
            border-radius: 4px;
            margin-top: 10px;
        }

        #banner-address:focus {
            border-color: #4d90fe;
        }

    </style>
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Mở/Đóng Menus"></div>
            </div>
            <!--logo start-->
            <a href="{{ url('') }}" class="logo"><b>Hune<span> Admin</span></b></a>
            <!--logo end-->

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="{{ url('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            @include('infor_admin.infor_admin')
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Edit Banner</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            {{-- <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="banner-address">
                            </div> --}}
                            {{-- <form action="{{ url('/banner') }}" method="POST" role="form"> --}}
                            {!! Form::model($post, [
                                'method' => 'PATCH',
                                'url' => ['/banner', $post->id],
                                'files' => true
                                        ]) 
                            !!}
                            {{-- {!! Form::open(['url' => '/ads/createNewBanner', 'class' => '', 'files' => true]) !!} --}}
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Url Website</label>
                                    <input name="banner-url" type="text" class="form-control" value="{{ $post->url }}" id="banner-url">
                                </div>
                                @if (isset($post->photos))
                                    <div class="form-group">
                                        <label>Old Image</label></br>
                                        <img src="https://prdapp.hunegroup.com/fileupload/Ads/{{ $post->photos }}" alt="" width="150" height="150">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="banner-image"  accept="image/*">
                                    <input value="{{ $post->photos }}" hidden name="banner-image" type="text" id="add-image">
                                    <input value="{{ $post->latitude }}" hidden name="banner-lat" type="text" id="lat">
                                    <input value="{{ $post->longitude }}" hidden name="banner-long" type="text" id="long">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $selected = $post->status;
                                    ?>
                                    <select name="banner-status" class="banner-status" value="{{ $selected }}">
                                        <option value="1" <?php if($selected == '1'){echo("selected");}?>>Active</option>
                                        <option value="0" <?php if($selected != '1'){echo("selected");}?>>Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    @php
                                        $createDate = new DateTime($post->date_created);
                                        $strip = $createDate->format('Y-m-d');
                                    @endphp
                                    <label>Date Create</label>
                                    <input style="width: 200px" value="{{ $strip }}" type="date" class="form-control" name="banner-date">
                                </div>
                                <div class="form-group">
                                    <!-- Search input -->
                                    <input id="banner-address" class="form-control" type="text" placeholder="Enter a location">

                                    <!-- Google map -->
                                    <div id="map"></div>

                                    <!-- Display geolocation data -->
                                    {{-- <ul hidden class="geo-data">
                                        <li>Full Address: <span id="location"></span></li>
                                        <li>Postal Code: <span id="postal_code"></span></li>
                                        <li>Country: <span id="country"></span></li>
                                        <li>Latitude: <input name="banner-lat" id="lat"></li>
                                        <li>Longitude: <input name="banner-long" id="lon"></li>
                                    </ul> --}}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success add-banner">Update</button>
                                </div>
                            {{-- </form> --}}
                            {!! Form::close() !!}

                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </section>
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        @include('footer')
    </section>
    @include('include_lib.lib_js')
</body>
    @include('handle_js.banner')

    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        // var map = new google.maps.Map(document.getElementById('map'), {
        //   center: {lat: 10.768384, lng: 106.684093},
        //   zoom: 13,
        //   mapTypeId: 'roadmap'
        // });
        var lat = <?php echo $post->latitude ?>;
        var lng = <?php echo $post->longitude ?>;


        var myLatLng = {lat: lat, lng: lng};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: myLatLng,
            mapTypeId: 'roadmap'
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('banner-address');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
            //   icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
            // Location details
            // for (var i = 0; i < place.address_components.length; i++) {
            //     console.log(place.address_components[i]);
            //     if(place.address_components[i].types[0] == 'postal_code'){
            //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            //     }
            //     if(place.address_components[i].types[0] == 'country'){
            //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
            //     }
            // }
            // document.getElementById('location').innerHTML = place.formatted_address;
            // document.getElementById('lat').val(place.geometry.location.lat());
            // document.getElementById('lon').val(place.geometry.location.lng());
            $('#lat').val(place.geometry.location.lat());
            $('#long').val(place.geometry.location.lng());
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvASYR4CMIQz345Dr7Ni27svGfldPN_NQ&libraries=places&callback=initAutocomplete"
         async defer></script>
</html>