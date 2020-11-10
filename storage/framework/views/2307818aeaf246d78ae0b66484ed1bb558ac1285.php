<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';

        function set_on_off(id, status) {
            $.ajax({
                url: "tours/status",
                data: {
                    'id': id,
                    'status': status
                },
                success: function(data) {
                    var old_status = $('#status-'+id+' span').html();
                    var check = '#' + id + '';
                    var _check = $(check);
                    if (old_status == 'On') {
                        var changeStatus = '<span class="label label-status label-warning label-mini">Off</span>';
                        _check.val('0');
                    } else {
                        var changeStatus = '<span class="label label-status label-success label-mini">On</span>';
                        _check.val('1');
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
            var user_id = $(this).attr('user_id');
            var title = $(this).attr('title_post');
            var old_status = $('#status-'+id+' span').html();

            if (old_status == 'Off') {
                var message = 'Đăng bài thành công';

                var queryJson =  {
                    "ClientName": "string", 
                    "ServiceCode": 500, 
                    "ActionName": "SendNotificationAllService", 
                    "Parameter": { 
                        "ReceiverId": user_id, 
                        "Title": title, 
                        "Message": message,
                        "ServiceCode": 900, 
                        "RefId": id, 
                        "Data": {
                            "Type": 1
                        } 
                    } 
                };

                const proxyurl = "https://cors-anywhere.herokuapp.com/";
                fetch(proxyurl + api_url, {
                    method: 'POST',
                    body: JSON.stringify(queryJson), // data can be `string` or {object}!
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }) // https://cors-anywhere.herokuapp.com/https://example.com
                .then(response => response.text())
                .then(function(contents) {
                    console.log(contents);
                })
                .catch(() => console.log("Can’t access " + api_url + " response. Blocked by browser?"))
            }
            set_on_off(id, status);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/dataTables_Tour.blade.php ENDPATH**/ ?>