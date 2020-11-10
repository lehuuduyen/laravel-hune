<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageRadius(radius) {
            $.ajax({
                url: "updateRadius",
                data: {
                    'radius': radius
                },
                success: function(data) {
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.edit-radius').click(function() {
            var radius = $('.new-radius').val();

            manageRadius(radius);
        });

    });
</script>