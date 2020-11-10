<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageType(id, name, date, status, option) {
            $.ajax({
                url: "activeType",
                data: {
                    'id': id,
                    'name': name,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit type
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

        $('.add-type').click(function() {
            var name = $('.add-type-name').val();
            var date = $('.add-type-date').val();
            var status = $('.add-type-status').val();
            manageType(null, name, date, status, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageType(id, null, null, null, 2);
        });

        $('.edit-type').click(function() {
            var id = $('.old-id').val();
            var name = $('.old-name').val();
            var date = $('.old-date').val();
            var status = $('.old-status').val();

            manageType(id, name, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-type').attr('set-id', id);
        });

        $('.delete-type').click(function() {
            var id = $(this).attr('set-id');
            manageType(id, null, null, null, 4);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/type.blade.php ENDPATH**/ ?>