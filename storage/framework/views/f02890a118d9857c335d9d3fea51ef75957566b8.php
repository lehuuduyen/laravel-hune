<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';

        function set_on_off(id, status, type) {
            $.ajax({
                url: "options/status",
                data: {
                    'id': id,
                    'status': status,
                    'type': type
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
            var user_id = $(this).attr('user_id');
            var title = $(this).attr('ads_name');
            var old_status = $('#status-'+id+' span').html();
            var type = $(this).attr('type_ser');

            if (old_status == 'Off') {
                var message = 'Mua gói ADS thành công';
                var queryJson =  {
                    "ClientName": "string", 
                    "ServiceCode": 500, 
                    "ActionName": "SendNotificationAllService", 
                    "Parameter": { 
                        "ReceiverId": user_id, 
                        "Title": title, 
                        "Message": message,
                        "ServiceCode": 200, 
                        "RefId": id, 
                        "Data": {
                            "Type": 6
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
                    // set_on_off(id, status, type);
                })
                .catch(() => console.log("Can’t access " + api_url + " response. Blocked by browser?"))
            }
            set_on_off(id, status, type);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/dataTables_Ads.blade.php ENDPATH**/ ?>