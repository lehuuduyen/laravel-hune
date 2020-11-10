<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        var parent_id = '<?php echo $parent_id; ?>';
        var parent_name = '<?php echo $parent_name; ?>';
        // console.log(parent_id);
        // console.log(parent_name);
        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }
        if (isEmptyOrSpaces(parent_id)) {
            parent_id = 0;
        }
        $('[data-toggle="tooltip"]').tooltip();

        function manageVehicle(id, name, type_vehicle, parent_id, date, status, option) {
            $.ajax({
                url: "activeVehicle",
                data: {
                    'id': id,
                    'name': name,
                    'type_vehicle': type_vehicle,
                    'parent_id': parent_id,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit vehicle
                    if (option == 3 || option == 4) {
                        $('.old-id').val(data['id']);
                        $('.old-name').val(data['vehicles']);
                        $('.old-date').val(data['date_created']);
                        $('.old-status').val(data['active']);
                        if (option == 4) {
                            $('.old-vehicle-type').val(data['type_vehicle']);
                            $('.old-parent-vehicle').val(data['parent_id']);
                        }
                    }
                    if (option == 5 || option == 6 || option == 7) {
                        window.location = '<?php echo url("/transports/vehicle") ?>'+location.search;
                    }
                    if (option == 2) {

                        location = '<?php echo url("/transports/vehicle?parent_id=") ?>'+parent_id+'&parent_name='+parent_name;
                        console.log(location);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-vehicle').click(function() {
            var name = $('.add-vehicle-name').val();
            var date = $('.add-vehicle-date').val();
            var status = $('.add-vehicle-status').val();
            if (parent_id == 0) {
                manageVehicle(null, name, null, null, date, status, 1);
            } else {
                var type_vehicle = $('.add-vehicle-type').val();
                manageVehicle(null, name, type_vehicle, parent_id, date, status, 2);
            }

        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            var vehicle = $(this).attr('vehicle');

            $('.old-parent-vehicle')
                .find('option')
                .remove()
                .end();

            $.ajax({
                url: "vehicle",
                data: {
                    "data_drop_down": true
                },
                success: function(data) {
                    data.forEach(element => {
                        var o = new Option(element['vehicles'], element['id']);
                        $(o).html(element['vehicles']);
                        $(".old-parent-vehicle").append(o);
                    });
                    $('.old-parent-vehicle').val(parent_id)
                },
                error: function(error) {
                    console.log(error);
                }
            });

            if (vehicle == 1) {
                manageVehicle(id, null, null, null, null, null, 3);
            } else {
                manageVehicle(id, null, null, null, null, null, 4);
            }
        });


        $('.edit-vehicle').click(function() {
            var id = $('.old-id').val();
            var name = $('.old-name').val();
            var date = $('.old-date').val();
            var status = $('.old-status').val();
            
            if (parent_id == 0) {
                manageVehicle(id, name, null, null, date, status, 5);
            } else {
                var type_vehicle = $('.old-vehicle-type').val();
                var parent_id = $('.old-parent-vehicle').val();
                manageVehicle(id, name, type_vehicle, parent_id, date, status, 6);
            }
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            var vehicle = $(this).attr('vehicle');
            $('.delete-vehicle').attr('set-id', id);
        });

        $('.delete-vehicle').click(function() {
            var id = $(this).attr('set-id');
            manageVehicle(id, null, null, null, null, null, 7);
        });
        
        // Select/Deselect checkboxes
        // var checkbox = $('table tbody input[type="checkbox"]');
        // $("#selectAll").click(function(){
        //     if(this.checked){
        //         checkbox.each(function(){
        //             this.checked = true;                        
        //         });
        //     } else{
        //         checkbox.each(function(){
        //             this.checked = false;                        
        //         });
        //     } 
        // });
        // checkbox.click(function(){
        //     if(!this.checked){
        //         $("#selectAll").prop("checked", false);
        //     }
        // });
    });
</script>