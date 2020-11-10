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
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/radius.blade.php ENDPATH**/ ?>