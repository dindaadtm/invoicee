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
                                    <li class="breadcrumb-item"><a href="javascript:">Detail</a></li>
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
                                        <h5>Detail Customers</h5>
                                        <a href="<?php echo base_url('admin/Customers/data') ?>"
                                            class="btn shadow-2 btn-primary pull-right">Data</a>
                                    </div>
                                    <?php 
                                    $id = $this->uri->segment(4);
                                    $this->db->where('id', $id);
                                    $row = $this->db->get('data_customer')->row();
                                    ?>
                                    <form id="input_data">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" class="form-control" 
                                                            value="<?= @$row->nama_perusahaan ?>" name="nama_perusahaan"
                                                            placeholder="Name" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="<?php echo @$row->nama ?>" placeholder="Name"
                                                             disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="tel" class="form-control" name="phone"
                                                            value="<?php echo @$row->phone ?>" placeholder="Phone"
                                                             disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12"  disabled>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="<?php echo @$row->email ?>" placeholder="Email"
                                                             disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea type="text" class="form-control form-textarea"
                                                             name="alamat" placeholder="Alamat" disabled><?= @$row->alamat ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea type="text" class="form-control form-textarea"
                                                             name="ket" placeholder="Keterangan" disabled><?= @$row->ket ?></textarea>
                                                    </div>
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
    <script type="text/javascript">
        $('#input_data').on('submit', function (e) {
            $('.loading').hide();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customers/detail') ?>",
                cache: false,
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.msg == 'success') {
                        $('.sukses_menyimpan').click();
                        setTimeout(function () {
                            window.location =
                                "<?php echo base_url('admin/Customers/detail') ?>";
                        }, 2000)
                    } else {
                        $('.gagal_menyimpan').click();
                    }
                    $('.loading').hide();
                },
                error: function () {
                    $('.gagal_menyimpan').click();
                    $('.loading').hide();
                }
            });
            return false;
        });

    </script>
