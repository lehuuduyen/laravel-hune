<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function manageAds(id, name, ads_cate_id, count_display, distance_display, price, date, option) {
            $.ajax({
                url: "ads/activeAds",
                data: {
                    'id': id,
                    'name': name,
                    'ads_cate_id': ads_cate_id,
                    'count_display': count_display,
                    'distance_display': distance_display,
                    'price': price,
                    'date': date,
                    'option': option
                },
                success: function(data) {
                    // edit ads
                    if (option == 2) {
                        $('.old-id').val(data['id']);
                        $('.old-name').val(data['name']);
                        $('.old-cate-type').val(data['ads_cate_id']);
                        $('.old-count-display').val(data['count_display']);
                        $('.old-distance-display').val(data['distance_display']);
                        $('.old-price').val(data['price']);
                        $('.old-date').val(data['date_created']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-ads').click(function() {
            var name = $('.add-name').val();
            var ads_cate_id = $('.add-cate-type').val();
            var count_display = $('.add-count-display').val();
            var distance_display = $('.add-distance-display').val();
            var price = $('.add-price').val();
            var date = $('.add-date').val();

            manageAds(null, name, ads_cate_id, count_display, distance_display, price, date, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageAds(id, null, null, null, null, null, null, 2);
        });

        $('.edit-ads').click(function() {
            var id = $('.old-id').val();
            var name = $('.old-name').val();
            var ads_cate_id = $('.old-cate-type').val();
            var count_display = $('.old-count-display').val();
            var distance_display = $('.old-distance-display').val();
            var price = $('.old-price').val();
            var date = $('.old-date').val();

            manageAds(id, name, ads_cate_id, count_display, distance_display, price, date, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-ads').attr('set-id', id);
        });

        $('.delete-ads').click(function() {
            var id = $(this).attr('set-id');
            manageAds(id, null, null, null, null, null, null, 4);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/ads.blade.php ENDPATH**/ ?>