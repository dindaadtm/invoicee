<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Vendors</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">
                                            <i class="feather icon-user"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Vendors</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Data</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Vendors</h5>
                                        <a href="<?php echo base_url('admin/Vendors/add') ?>"
                                            class="btn shadow-2 btn-success pull-right">Add</a>
                                        <a href="<?php echo base_url('admin/Vendors/data') ?>"
                                            class="btn shadow-2 btn-primary pull-right">Data</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table id="zero-configuration"
                                                class="display table nowrap table-striped table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $get_vendor = $this->db->get('data_vendor')->result();
                                                    foreach ($get_vendor as $value) { ?>
                                                    <tr>
                                                        <td><?= $value->nama ?></td>
                                                        <td><?= $value->phone ?></td>
                                                        <td><?= $value->email ?></td>
                                                        <td>
                                                            <?= get_detail_edit_delete_js($value->id) ?>
                                                        </td>
                                                    </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function get_detail(id) {
            window.location = ('<?= base_url() ?>admin/Vendors/detail/' + id)
        }

        function get_edit(id) {
            window.location = ('<?= base_url() ?>admin/Vendors/edit/' + id)
        }

    </script>
    <script>
        function get_delete(id) {
            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Delete this data?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
                            text: 'Yes',
                            addClass: 'btn btn-sm btn-primary'
                        },
                        {
                            addClass: 'btn btn-sm btn-link'
                        }
                    ]
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: false
                }
            })

            notice.get().on('pnotify.confirm', function () {
                act_delete(id);
            })

        }

        function act_delete(id) {
            where_value = id;
            where_field = 'id';
            table_name = 'data_vendor';
            $('.loading').show();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Vendors/delete_data') ?>",
                cache: false,
                data: {
                    where_value: where_value,
                    where_field: where_field,
                    table_name,
                    table_name
                },
                dataType: 'json',
                success: function (data) {
                    if (data.msg == 'success') {
                        $('.sukses_menghapus').click();
                        setTimeout(function () {
                            location.reload();
                        }, 1500)
                    } else {
                        $('.gagal_menghapus').click();
                    }
                    $('.loading').hide();
                },
                error: function () {
                    $('.loading').hide();
                    $('.error_menyimpan').click();
                }
            });
        }

    </script>
    <button type="button" style="display:none" class="sukses_menghapus" id="sukses_menghapus"></button>
    <button type="button" style="display:none" class="gagal_menghapus" id="gagal_menghapus"></button>
    <button type="button" style="display:none" class="error_menyimpan" id="error_menyimpan"></button>
