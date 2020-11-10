<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        const api_url = 'https://prdapp.hunegroup.com/api/upload/uploadfile';
        const proxyurl = "https://cors-anywhere.herokuapp.com/";
        var image = '';

        function manageUsersPlay(id, total, status, expire_date, option) {
            $.ajax({
                url: "users-play/updateUsersPlay",
                data: {
                    'id': id,
                    'total': total,
                    'status': status,
                    'expire_date': expire_date,
                    'option': option
                },
                success: function(data) {
                    // edit users-play
                    if (option == 2) {
                        $('.old-users-play-id').val(data['id']);
                        $('.old-users-play-saction').val(data['saction']);
                        $('.old-users-play-total').val(data['total']);
                        $('.old-users-play-date-created').val(data['date_created'].substring(0, 10));
                        $('.old-users-play-expire-date').val(data['expire_date'].substring(0, 10));
                        $('.old-users-play-status').val(data['status']);
                    }
                    if (option == 4 || option == 5) {
                        alert('Sum Total: '+ data);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageUsersPlay(id, null, null, null, 2);
        });

        $('.view-sum-total').click(function() {
            var id = $(this).attr('value');
            manageUsersPlay(id, null, null, null, 4);
        });

        $('.view-sum-total-point').click(function() {
            manageUsersPlay(null, null, null, null, 5);
        });

        $('.edit-users-play').click(function() {
            var id = $('.old-users-play-id').val();
            var total = $('.old-users-play-total').val();
            var status = $('.old-users-play-status').val();
            var expire_date = $('.old-users-play-expire-date').val();

            manageUsersPlay(id, total, status, expire_date, 3);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/users_play.blade.php ENDPATH**/ ?>