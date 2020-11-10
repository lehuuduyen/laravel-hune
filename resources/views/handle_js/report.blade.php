<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageReport(id, name, date, status, option) {
            $.ajax({
                url: "activeReport",
                data: {
                    'id': id,
                    'name': name,
                    'date': date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit report
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

        $('.add-report').click(function() {
            var name = $('.add-report-name').val();
            var date = $('.add-report-date').val();
            var status = $('.add-report-status').val();
            manageReport(null, name, date, status, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageReport(id, null, null, null, 2);
        });

        $('.edit-report').click(function() {
            var id = $('.old-id').val();
            var name = $('.old-name').val();
            var date = $('.old-date').val();
            var status = $('.old-status').val();

            manageReport(id, name, date, status, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-report').attr('set-id', id);
        });

        $('.delete-report').click(function() {
            var id = $(this).attr('set-id');
            manageReport(id, null, null, null, 4);
        });
    });
</script>