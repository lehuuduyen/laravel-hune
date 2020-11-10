<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';
        var point = 0;

        function set_on_off(id, status) {
            $.ajax({
                url: "users/status",
                data: {
                    'id': id,
                    'status': status
                },
                success: function(data) {
                    var old_status = $('#status-'+id+' span').html();
                    if (old_status == 'On') {
                        var changeStatus = '<span class="label label-status label-warning label-mini">Off</span>';
                    } else {
                        var changeStatus = '<span class="label label-status label-success label-mini">On</span>';
                    }
                    $('#status-'+id).html(changeStatus);
                },
                error: function(error) {
                }
            });
        }

        $('button.power_off').click(function() {
            var status = $(this).val();
            var id = $(this).attr('id');
            set_on_off(id, status);
        });

        function getPoint(token, user_name) {
            alert('Đang tính toán point cho '+user_name+', Vui lòng đợi 1 vài giây!');
            const proxyurl = "https://cors-anywhere.herokuapp.com/";

            var queryJson =  {
                "ClientName": "string", 
                "ServiceCode": 100, 
                "ActionName": "UsersPoint", 
                "Parameter": { 
                    "Token": token
                } 
            };
            // console.log(queryJson);

            fetch(proxyurl + api_url, {
                method: 'POST',
                body: JSON.stringify(queryJson), // data can be `string` or {object}!
                headers: {
                    'Content-Type': 'application/json'
                }
            }) // https://cors-anywhere.herokuapp.com/https://example.com
            .then(response => response.text())
            .then(contents => {
                var obj = JSON.parse(contents);
                alert('Done!');
                point = obj['Data'];
                $('.point_current').val(point);
                // $('.submit-add-point').prop('disabled', false);
                $('.point_add_point').prop('disabled', false);
                // console.log(obj);
                // console.log(point);
            })
            .catch(() => console.log("Can’t access " + api_url + " response. Blocked by browser?"));

            // return point;
        }

        function managePoint(user_id, point, option) {
            $.ajax({
                url: "users/activePoint",
                data: {
                    'user_id': user_id,
                    'point': point,
                    'option': option
                },
                success: function(data) {
                    console.log(data);
                    // edit point
                    if (option == 2) {
                        $('.point_user_id').val(data['id']);
                        $('.point_full_name').val(data['full_name']);
                        $('.point_current').val(data['point']);

                        $('.point_add_point').prop('disabled', false);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }

        $('.point_add_point').keyup(function() {
            // this.value = this.value.replace(/^-?[0-9]*\.?[0-9]+$/g,'');
            // console.log(this.value);
            var point = $(this).val();
            if (!isEmptyOrSpaces(point)) {
                $('.submit-add-point').prop('disabled', false);
            }
            else {
                $('.submit-add-point').prop('disabled', true);
            }

        });

        $('.add_point').click(function() {
            $('.submit-add-point').prop('disabled', true);
            $('.point_add_point').prop('disabled', true);

            var user_name = $(this).attr('user_name');
            var user_id = $(this).attr('value');
            var token = $(this).attr('token');
            // getPoint(token, user_name);

            managePoint(user_id, null, 2);
        });

        $('.submit-add-point').click(function() {
            var user_id = $('.point_user_id').val();
            var point = $('.point_add_point').val();

            managePoint(user_id, point, 3);
        });

    });
</script>