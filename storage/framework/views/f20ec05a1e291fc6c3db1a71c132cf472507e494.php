<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        const api_url = 'https://prdapp.hunegroup.com/api/upload/uploadfile';
        const proxyurl = "https://cors-anywhere.herokuapp.com/";
        var image = '';

        function manageCampaign(id, title, content, total, expire_date, status, option) {
            $.ajax({
                url: "campaign/updateCampaign",
                data: {
                    'id': id,
                    'title': title,
                    'content': content,
                    'total': total,
                    'expire_date': expire_date,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit campaign
                    if (option == 2) {
                        $('.old-campaign-id').val(data['id']);
                        $('.old-campaign-title').val(data['title']);
                        $('.old-campaign-content').val(data['content']);
                        $('.old-campaign-total').val(data['total']);
                        $('.old-campaign-expire-date').val(data['expire_date'].substring(0, 10));
                        $('.old-campaign-status').val(data['status']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageCampaign(id, null, null, null, null, null, 2);
        });

        $('.edit-campaign').click(function() {
            var id = $('.old-campaign-id').val();
            var title = $('.old-campaign-title').val();
            var content = $('.old-campaign-content').val();
            var total = $('.old-campaign-total').val();
            var expire_date = $('.old-campaign-expire-date').val();
            var status = $('.old-campaign-status').val();

            manageCampaign(id, title, content, total, expire_date, status, 3);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/campaign.blade.php ENDPATH**/ ?>