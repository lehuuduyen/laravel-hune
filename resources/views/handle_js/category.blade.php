<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageCate(id, name, date, status, option) {
            $.ajax({
                url: "activeCate",
                data: {
                    'id': id,
                    'name': name,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit cate
                    if (option == 2) {
                        $('.old-id').val(data['id']);
                        $('.old-name').val(data['name']);
                        $('.old-date').val(data['date_created']);
                        $('.old-status').val(data['active']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-cate').click(function() {
            var name = $('.add-cate-name').val();
            var date = $('.add-cate-date').val();
            var status = $('.add-cate-status').val();
            manageCate(null, name, date, status, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageCate(id, null, null, null, 2);
        });

        $('.edit-cate').click(function() {
            var id = $('.old-id').val();
            var name = $('.old-name').val();
            var date = $('.old-date').val();
            var status = $('.old-status').val();

            manageCate(id, name, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-cate').attr('set-id', id);
        });

        $('.delete-cate').click(function() {
            var id = $(this).attr('set-id');
            manageCate(id, null, null, null, 4);
        });
    });
</script>