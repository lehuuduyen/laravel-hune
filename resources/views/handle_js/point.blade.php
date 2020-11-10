<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function managePoint(id, num_day, point, from_logic, date, status, option) {
            $.ajax({
                url: "activePoint",
                data: {
                    'id': id,
                    'num_day': num_day,
                    'point': point,
                    'from_logic': from_logic,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit point
                    if (option == 2) {
                        $('.old-id').val(data['id']);
                        $('.old-num_day').val(data['num_day']);
                        $('.old-point').val(data['point']);
                        $('.old-from_logic').val(data['from_logic']);
                        $('.old-date').val(data['date_created']);
                        $('.old-status').val(data['active']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-point').click(function() {
            var num_day = $('.add-point-num_day').val();
            var point = $('.add-point-point').val();
            var from_logic = $('.add-point-from_logic').val();
            var date = $('.add-point-date').val();
            var status = $('.add-point-status').val();
            managePoint(null, num_day, point, from_logic, date, status, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            managePoint(id, null, null, null, null, null, 2);
        });

        $('.edit-point').click(function() {
            var id = $('.old-id').val();
            var num_day = $('.old-num_day').val();
            var point = $('.old-point').val();
            var from_logic = $('.old-from_logic').val();
            var date = $('.old-date').val();
            var status = $('.old-status').val();

            managePoint(id, num_day, point, from_logic, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-point').attr('set-id', id);
        });

        $('.delete-point').click(function() {
            var id = $(this).attr('set-id');
            managePoint(id, null, null, null, null, null, 4);
        });
    });
</script>