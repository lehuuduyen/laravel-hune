<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        const api_url = 'https://prdapp.hunegroup.com/api/upload/uploadfile';
        const proxyurl = "https://cors-anywhere.herokuapp.com/";
        var image = '';

        document.querySelector('#banner-image').addEventListener('change', event => {
            $('.add-banner').prop('disabled', true);
            handleImageUpload(event);
        });

        const handleImageUpload = event => {
            alert('File hình ảnh đang được upload! Vui lòng đợi 1 vài giây!');

            const files = event.target.files;
            const formData = new FormData();
            var file_name = files[0]['name'];
            file_name = file_name.replace(/\s+/g, '_');
            // console.log(files);
            formData.append('myFile', files[0], '200$banner$'+file_name);

            fetch(proxyurl + api_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                image = data['Data'];
                // console.log(data);

                $('.add-banner').prop('disabled', false);
                alert('Upload hình ảnh thành công!');
                $('#add-image').val(image);
                // console.log($('#add-image').val());
            })
            .catch(error => {
                alert('Upload hình ảnh bị lỗi!');
                $('.add-banner').prop('disabled', false);
                // console.log(error)
            })
        }
    });
</script>