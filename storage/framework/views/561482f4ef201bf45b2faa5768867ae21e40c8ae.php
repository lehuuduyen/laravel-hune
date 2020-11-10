<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';

        function approvedPost(postid, user_id) {
            $.ajax({
                url: "approved-post",
                data: {
                    'postid': postid,
                    'user_id': user_id
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        $('button.power_off').click(function() {
            var id = $(this).attr('id');
            var user_id = $(this).attr('user_id');
            var old_status = $('#status-'+id+' span').html();

            if (old_status == 'Off') {
                approvedPost(id, user_id);
            }
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/approvedPost.blade.php ENDPATH**/ ?>