<script type="text/javascript">
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        const api_url = 'https://prdapp.hunegroup.com/api/upload/uploadfile';
        const proxyurl = "https://cors-anywhere.herokuapp.com/";
        var image = '';

        function manageCoupon(id, image, title, date_start, date_end, point, status, date_created, url, desc, address, amount, cate, policy, shopname, phone, email, option) {
            $.ajax({
                url: "activeCoupon",
                data: {
                    'id': id,
                    'image': image,
                    'title': title,
                    'date_start': date_start,
                    'date_end': date_end,
                    'point': point,
                    'date_created': date_created,
                    'url': url,
                    'desc': desc,
                    'address': address,
                    'amount': amount,
                    'cate': cate,
                    'policy': policy,
                    'shopname': shopname,
                    'phone': phone,
                    'email': email,
                    'status': status,
                    'option': option
                },
                success: function(data) {
                    // edit coupon
                    if (option == 2) {
                        $('.old-coupon-id').val(data['id']);
                        $('.old-coupon-image').attr('value', data['image']);
                        $('.old-coupon-title').val(data['title']);
                        $('.old-coupon-date').val(data['date_created'].substring(0, 10));
                        $('.old-coupon-date-start').val(data['date_start'].substring(0, 10));
                        $('.old-coupon-date-end').val(data['date_end'].substring(0, 10));
                        $('.old-coupon-url').val(data['url']);
                        $('.old-coupon-cate').val(data['cate_id']);
                        $('.old-coupon-point').val(data['point']);
                        $('.old-coupon-desc').val(data['description']);
                        $('.old-coupon-address').val(data['address']);
                        $('.old-coupon-amount').val(data['amount']);
                        $('.old-coupon-phone').val(data['phone']);
                        $('.old-coupon-email').val(data['email']);
                        $('.old-coupon-policy').val(data['policy']);
                        $('.old-coupon-shop-name').val(data['shopname']);
                        $('.old-coupon-status').val(data['status']);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        document.querySelector('#add-fileUpload').addEventListener('change', event => {
            $('.add-coupon').prop('disabled', true);
            handleImageUpload(event);
        });

        document.querySelector('#edit-fileUpload').addEventListener('change', event => {
            $('.edit-coupon').prop('disabled', true);
            handleImageUpload(event);
        });

        const handleImageUpload = event => {
            alert('File hình ảnh đang được upload! Vui lòng đợi 1 vài giây!');

            const files = event.target.files;
            const formData = new FormData();
            var file_name = files[0]['name'];
            file_name = file_name.replace(/\s+/g, '_');
            // console.log(files);
            formData.append('myFile', files[0], '100$coupon$'+file_name);

            fetch(proxyurl + api_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                image = data['Data'];
                // console.log(data);
                $('.old-coupon-image').attr('value', image);

                $('.add-coupon').prop('disabled', false);
                $('.edit-coupon').prop('disabled', false);
                alert('Upload hình ảnh thành công!');
            })
            .catch(error => {
                alert('Upload hình ảnh bị lỗi!');
                $('.add-coupon').prop('disabled', false);
                // console.log(error)
            })
        }

        $('a.btn.btn-success').click(function() {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day);
            // console.log(today);
            var date_created = $('.add-coupon-date').val(today);
        });

        $('.add-coupon').click(function() {
            var title = $('.add-coupon-title').val();
            var date_created = $('.add-coupon-date').val();
            var date_start = $('.add-coupon-date-start').val();
            var date_end = $('.add-coupon-date-end').val();
            var url = $('.add-coupon-url').val();
            var cate = $('.add-coupon-cate').val();
            var point = $('.add-coupon-point').val();
            var desc = $('.add-coupon-desc').val();
            var address = $('.add-coupon-address').val();
            var amount = $('.add-coupon-amount').val();
            var phone = $('.add-coupon-phone').val();
            var email = $('.add-coupon-email').val();
            var policy = $('.add-coupon-policy').val();
            var shopname = $('.add-coupon-shop-name').val();
            var status = $('.add-coupon-status').val();

            manageCoupon(null, image, title, date_start, date_end, point, status, date_created, url, desc, address, amount, cate, policy, shopname, phone, email, 1);
        });

        $('.edit').click(function() {
            var id = $(this).attr('value');
            manageCoupon(id, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2);
        });

        $('.edit-coupon').click(function() {
            var id = $('.old-coupon-id').val();
            var title = $('.old-coupon-title').val();
            var image = $('.old-coupon-image').attr('value');
            var date_created = $('.old-coupon-date').val();
            var date_start = $('.old-coupon-date-start').val();
            var date_end = $('.old-coupon-date-end').val();
            var url = $('.old-coupon-url').val();
            var cate = $('.old-coupon-cate').val();
            var point = $('.old-coupon-point').val();
            var desc = $('.old-coupon-desc').val();
            var address = $('.old-coupon-address').val();
            var amount = $('.old-coupon-amount').val();
            var phone = $('.old-coupon-phone').val();
            var email = $('.old-coupon-email').val();
            var policy = $('.old-coupon-policy').val();
            var shopname = $('.old-coupon-shop-name').val();
            var status = $('.old-coupon-status').val();

            manageCoupon(id, image, title, date_start, date_end, point, status, date_created, url, desc, address, amount, cate, policy, shopname, phone, email, 3);
        });

        $('.delete').click(function() {
            var id = $(this).attr('value');
            $('.delete-coupon').attr('set-id', id);
        });

        $('.delete-coupon').click(function() {
            var id = $(this).attr('set-id');
            manageCoupon(id, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 4);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/couponUsed.blade.php ENDPATH**/ ?>