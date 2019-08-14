<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Customers</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">
                                            <i class="feather icon-user"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Customers</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Add</a></li>
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
                                        <h5>Add Customer</h5>
                                        <a href="<?php echo base_url('admin/customers/add') ?>"
                                            class="btn shadow-2 btn-success pull-right">Add</a>
                                        <a href="<?php echo base_url('admin/customers/data') ?>"
                                            class="btn shadow-2 btn-primary pull-right">Data</a>
                                    </div>
                                    <form id="input_data">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" class="form-control" required name="nama_perusahaan"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" required name="nama"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>No Telp</label>
                                                        <input type="tel" class="form-control" required name="phone"
                                                            placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" required name="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea type="text" class="form-control form-textarea" required name="alamat"
                                                            placeholder="Alamat"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea type="text" class="form-control form-textarea" required name="ket"
                                                            placeholder="Keterangan"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="feather icon-send"></i>Save </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <button type="button" style="display:none" class="btn btn-success btn-sm sukses_menyimpan"
        id="sukses_menyimpan"></button>
    <button type="button" style="display:none" class="btn btn-success btn-sm gagal_menyimpan"
        id="gagal_menyimpan"></button>
    <button type="button" style="display:none" class="btn btn-success btn-sm error_menyimpan"
        id="error_menyimpan"></button>
    <button type="button" style="display:none" class="btn btn-success btn-sm tersedia" id="tersedia"></button>
    </div>
    <script type="text/javascript">
        $('#input_data').submit(function () {
            $('.loading').show();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/customers/insert_data') ?>",
                cache: false,
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.msg == 'success') {
                        $('.sukses_menyimpan').click();
                        setTimeout(function () {
                            window.location = "<?php echo base_url('admin/customers') ?>";
                        }, 2000)
                    } else if (data.msg == 'fail') {
                        $('.gagal_menyimpan').click();
                    } else {
                        $('.tersedia').click();
                    }
                    $('.loading').hide();
                },
                error: function () {
                    $('.loading').hide();
                    $('.error_menyimpan').click();
                }
            });
            return false;
        });

    </script>
