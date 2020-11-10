<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageAdmin(id, username, password, email, level, date, status, option) {
            $.ajax({
                url: "admins/activeAdmin",
                data: {
                    'id': id,
                    'username': username,
                    'password': password,
                    'email': email,
                    'level': level,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit admin
                    if (option == 2) {
                        $('.old-admin-id').val(data['id']);
                        $('.old-admin-username').val(data['username']);
                        $('.old-admin-password').val(data['password']);
                        $('.old-admin-email').val(data['email']);
                        $('.old-admin-level').val(data['level']);
                        $('.old-admin-date').val(data['created_at']);
                        $('.old-admin-status').val(data['status']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-admin').click(function() {
            var username = $('.add-admin-username').val();
            var password = $('.add-admin-password').val();
            var email = $('.add-admin-email').val();
            var level = $('.add-admin-level').val();
            var date = $('.add-admin-date').val();
            var status = $('.add-admin-status').val();
            manageAdmin(null, username, password, email, level, date, status, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageAdmin(id, null, null, null, null, null, null, 2);
        });

        $('.edit-admin').click(function() {
            var id = $('.old-admin-id').val();
            var username = $('.old-admin-username').val();
            var password = $('.old-admin-password').val();
            var email = $('.old-admin-email').val();
            var level = $('.old-admin-level').val();
            var date = $('.old-admin-date').val();
            var status = $('.old-admin-status').val();

            manageAdmin(id, username, password, email, level, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-admin').attr('set-id', id);
        });

        $('.delete-admin').click(function() {
            var id = $(this).attr('set-id');
            manageAdmin(id, null, null, null, null, null, null, 4);
        });
    });
</script>