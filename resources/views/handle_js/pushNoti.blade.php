<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function managePushNoti(id, title, message, addeddate, updateddate, status, option) {
            $.ajax({
                url: "activePushNoti",
                data: {
                    'id': id,
                    'title': title,
                    'message': message,
                    'addeddate': addeddate,
                    'updateddate': updateddate,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit
                    if (option == 2) {
                        $('.old-id').val(data['id']);
                        $('.old-title').val(data['title']);
                        $('.old-message').val(data['message']);
                        $('.old-status').val(data['status']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-push').click(function() {
            var title = $('.add-push-title').val();
            var message = $('.add-push-message').val();
            var date = $('.add-push-date-cre').val();
            managePushNoti(null, title, message, date, date, 'New', 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            managePushNoti(id, null, null, null, null, null, 2);
        });

        $('.edit-push').click(function() {
            var id = $('.old-id').val();
            var title = $('.old-title').val();
            var message = $('.old-message').val();
            var date = $('.old-date-up').val();
            var status = $('.old-status').val();

            managePushNoti(id, title, message, date, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-push').attr('set-id', id);
        });

        $('.delete-push').click(function() {
            var id = $(this).attr('set-id');
            managePushNoti(id, null, null, null, null, null, 4);
        });
    });
</script>