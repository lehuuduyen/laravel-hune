<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        function actionAppInformation(id, updateApp, versionIOS, versionAndroid, option) {
            $.ajax({
                url: "actionAppInformation",
                data: {
                    'id': id,
                    'updateApp': updateApp,
                    'versionIOS': versionIOS,
                    'versionAndroid': versionAndroid,
                    'option': option
                },
                success: function(data) {
                    // edit
                    if (option == 2) {
                        $('.old-id').val(data['id']);
                        $('.old-updateApp').val(data['updateApp']);
                        $('.old-versionIOS').val(data['versionIOS']);
                        $('.old-versionAndroid').val(data['versionAndroid']);
                        $('.old-status').val(data['status']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('.add-information').click(function() {
            var updateApp = $('.add-updateApp').val();
            var versionIOS = $('.add-versionIOS').val();
            var versionAndroid = $('.add-versionAndroid').val();
            actionAppInformation(null, updateApp, versionIOS, versionAndroid, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            actionAppInformation(id, null, null, null, 2);
        });

        $('.edit-information').click(function() {
            var id = $('.old-id').val();
            var updateApp = $('.old-updateApp').val();
            var versionIOS = $('.old-versionIOS').val();
            var versionAndroid = $('.old-versionAndroid').val();

            actionAppInformation(id, updateApp, versionIOS, versionAndroid, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-information').attr('set-id', id);
        });

        $('.delete-information').click(function() {
            var id = $(this).attr('set-id');
            actionAppInformation(id, null, null, null, 4);
        });
    });
</script>