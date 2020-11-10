<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .form-group {
            margin: 10px;
        }

        #video-address {
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

        #video-address:focus {
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
            <a href="<?php echo e(url('')); ?>" class="logo"><b>Hune<span> Admin</span></b></a>
            <!--logo end-->

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="<?php echo e(url('logout')); ?>">Logout</a>
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
            <?php echo $__env->make('infor_admin.infor_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Edit Video</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <?php echo Form::model($post, [
                                'method' => 'PATCH',
                                'url' => ['/video', $post->id],
                                'files' => true
                                        ]); ?>

                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label>Video Name</label>
                                    <input name="video-name" type="text" class="form-control" id="video-name" value="<?php echo e($post->video_name); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Service Code</label>
                                    <select name="video-servicecode" id="video-servicecode" class="form-control">
                                        <option <?php echo e(old('video-servicecode', $post->servicecode) == null ? 'selected' : ''); ?>>--Vui lòng lựa chọn 1 dịch vụ--</option>
                                        <option value="300" <?php echo e(old('video-servicecode', $post->servicecode) == 300 ? 'selected' : ''); ?>>Transport</option>
                                        <option value="600" <?php echo e(old('video-servicecode', $post->servicecode) == 600 ? 'selected' : ''); ?>>LandHouse</option>
                                        <option value="700" <?php echo e(old('video-servicecode', $post->servicecode) == 700 ? 'selected' : ''); ?>>Recruitment</option>
                                        <option value="800" <?php echo e(old('video-servicecode', $post->servicecode) == 800 ? 'selected' : ''); ?>>Nail</option>
                                        <option value="900" <?php echo e(old('video-servicecode', $post->servicecode) == 900 ? 'selected' : ''); ?>>Tour</option>
                                        <option value="1000" <?php echo e(old('video-servicecode', $post->servicecode) == 100 ? 'selected' : ''); ?>>Shop</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Count Display</label>
                                    <input name="video-count" type="text" class="form-control" id="video-count" value="<?php echo e($post->count_display); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Distance Display</label>
                                    <input name="video-distance" type="text" class="form-control" id="video-distance" value="<?php echo e($post->distance_display); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Video Price</label>
                                    <input name="video-price" type="text" class="form-control" id="video-price" value="<?php echo e($post->price); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input name="video-url" type="text" class="form-control" id="video-url" value="<?php echo e($post->url); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input name="video-website" type="text" class="form-control" id="video-website" value="<?php echo e($post->website); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="video-desc" id="video-desc" rows="4" class="form-control" cols="50"><?php echo e($post->description); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>To Email</label>
                                    <input name="video-toEmail" type="text" class="form-control" id="video-toEmail" value="<?php echo e($post->ToEmail); ?>">
                                </div>
                                <div class="form-group">
                                    <label>To Name</label>
                                    <input name="video-toName" type="text" class="form-control" id="video-toName" value="<?php echo e($post->ToName); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <input name="video-note" type="text" class="form-control" id="video-note" value="<?php echo e($post->sNote); ?>">
                                </div>
                                <?php if(isset($post->thumbnail)): ?>
                                    <div class="form-group">
                                        <label>Old Image</label></br>
                                        <img src="https://prdapp.hunegroup.com/fileupload/Ads/<?php echo e($post->thumbnail); ?>" alt="" width="150" height="150">
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="video-image"  accept="image/*">
                                    <input value="<?php echo e($post->thumbnail); ?>" hidden name="video-image" type="text" id="add-image">
                                    <input value="<?php echo e($post->latitude); ?>" hidden name="video-lat" type="text" id="lat">
                                    <input value="<?php echo e($post->longitude); ?>" hidden name="video-long" type="text" id="long">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $selected = $post->status;
                                    ?>
                                    <select name="video-status" class="video-status" value="<?php echo e($selected); ?>">
                                        <option value="1" <?php if($selected == '1'){echo("selected");}?>>Active</option>
                                        <option value="0" <?php if($selected != '1'){echo("selected");}?>>Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $createDate = new DateTime($post->date_created);
                                        $strip = $createDate->format('Y-m-d');
                                    ?>
                                    <label>Date Create</label>
                                    <input style="width: 200px" value="<?php echo e($strip); ?>" type="date" class="form-control" name="video-date">
                                </div>
                                <div class="form-group">
                                    <!-- Search input -->
                                    <input id="video-address" class="form-control" type="text" placeholder="Enter a location">

                                    <!-- Google map -->
                                    <div id="map"></div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success add-video">Update</button>
                                </div>
                            
                            <?php echo Form::close(); ?>


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
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
    <?php echo $__env->make('handle_js.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        var input = document.getElementById('video-address');
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
            $('#lat').val(place.geometry.location.lat());
            $('#long').val(place.geometry.location.lng());
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvASYR4CMIQz345Dr7Ni27svGfldPN_NQ&libraries=places&callback=initAutocomplete"
         async defer></script>
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/ads/editVideo.blade.php ENDPATH**/ ?>