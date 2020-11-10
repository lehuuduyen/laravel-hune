<script>
    $(document).ready( function () {
        var api_url = 'https://prdapp.hunegroup.com/api/HuneGatewayMobile/ProcessAPI/';

        function set_on_off(id, status) {
            $.ajax({
                url: "transports/status",
                data: {
                    'id': id,
                    'status': status
                },
                success: function(data) {
                    var old_status = $('#status-'+id+' span').html();
                    var check = '#' + id + '';
                    var _check = $(check);
                    if (old_status == 'On') {
                        var changeStatus = '<span class="label label-status label-warning label-mini">Off</span>';
                        _check.val('0');
                    } else {
                        var changeStatus = '<span class="label label-status label-success label-mini">On</span>';
                        _check.val('1');
                    }
                    $('#status-'+id).html(changeStatus);
                },
                error: function(error) {
                }
            });
        }
        $('button.power_off').click(function() {
            var status = $(this).val();
            var id = $(this).attr('id');
            var user_id = $(this).attr('user_id');
            var title = $(this).attr('title_post');
            var old_status = $('#status-'+id+' span').html();

            if (old_status == 'Off') {
                var message = 'Đăng bài thành công';

                var queryJson =  {
                    "ClientName": "string", 
                    "ServiceCode": 500, 
                    "ActionName": "SendNotificationAllService", 
                    "Parameter": { 
                        "ReceiverId": user_id, 
                        "Title": title, 
                        "Message": message,
                        "ServiceCode": 300, 
                        "RefId": id, 
                        "Data": {
                            "Type": 1
                        } 
                    } 
                };

                const proxyurl = "https://cors-anywhere.herokuapp.com/";
                fetch(proxyurl + api_url, {
                    method: 'POST',
                    body: JSON.stringify(queryJson), // data can be `string` or {object}!
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }) // https://cors-anywhere.herokuapp.com/https://example.com
                .then(response => response.text())
                .then(function(contents) {
                    console.log(contents);
                })
                .catch(() => console.log("Can’t access " + api_url + " response. Blocked by browser?"))
            }
            set_on_off(id, status);
        });
        // $(function() {
        //     $('#dataTable_Trans').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             method: 'GET',
        //             dataType: 'json',
        //             url: '/transports/getDataTrans?'
        //         },
        //         columns: [
        //             { data: 'id', name: 'post.id' },
        //             { data: 'title', name: 'post.title' },
        //             { data: 'date_created', name: 'post.date_created' },
        //             { data: 'price', name: 'post.price' },
        //             { data: 'status', name: 'post.status' },
        //             { data: 'image', name: 'post.image' },
        //             { data: 'action', name: 'post.action' }
        //         ],
        //         ordering: true,
        //         order: [0, 'desc'],
        //         autoWidth: false,
        //         responsive: true,
        //         pagingType: "full_numbers",
        //         pageLength: 50,
        //         oLanguage: {
        //             sLengthMenu: 'Hiển thị: <select>' +
        //                 '<option value="50">50</option>' +
        //                 '<option value="100">100</option>' +
        //                 '<option value="200">200</option>' +
        //                 '<option value="500">500</option>' +
        //                 '<option value="1000">1000</option>' +
        //                 '<option value="2000">2000</option>' +
        //                 '<option value="-1">All</option>' +
        //                 '</select> dòng',
        //             sSearch: "Tìm kiếm: ",
        //             sInfo: "Đang hiển thị _START_ đến _END_ trên tổng số _TOTAL_ dòng",
        //             sInfoEmpty: "Không tìm thấy kết quả",
        //             sZeroRecords: "Không có kết quả để hiển thị",
        //             sInfoFiltered: "( Được lọc từ _MAX_ dòng )"
        //         }
        //     });

        //     var table = $('#dataTable_Trans').DataTable();

        //     table.on('click', 'button.power_off', function () {
        //         var status = $(this).val();
        //         var id = $(this).attr('id');
        //         set_on_off(id, status);

        //         var parentRow = $(this).closest("tr");
        //         var row = table.row(parentRow).index();

        //         var rowData = table.row(parentRow).data();

        //         var status = rowData.status; 

        //         if (status == '<span class="label label-status label-success label-mini">On</span>') {
        //             var changeStatus = '<span class="label label-status label-warning label-mini">Off</span>';
        //         }
        //         if (status == '<span class="label label-status label-warning label-mini">Off</span>') {
        //             var changeStatus = '<span class="label label-status label-success label-mini">On</span>';
        //         }
        //         table.cell({row: row, column: 4}).data(changeStatus).draw;
        //     });

        //     table.on('processing.dt', function (e, settings, processing) {
        //         $('#processingIndicator').css('display', 'none');
        //         if (processing) {
        //             $('html,body').animate({
        //                 scrollTop: 135
        //             }, 700);
        //             $(e.currentTarget).LoadingOverlay("show");
        //         } else {
        //             $(e.currentTarget).LoadingOverlay("hide", true);
        //         }
        //     });
		// 	$.fn.dataTable.ext.errMode = 'throw'
        // });
    });
</script><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/handle_js/dataTables_Trans.blade.php ENDPATH**/ ?>