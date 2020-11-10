<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';

        function set_on_off(id, status) {
            $.ajax({
                url: "status/video",
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
                    alert('Đã xảy ra lỗi khi thay đổi status');
                }
            });
        }
        $('button.power_off').click(function() {
            var status = $(this).val();
            var id = $(this).attr('id');

            set_on_off(id, status);
        });
    });
</script>