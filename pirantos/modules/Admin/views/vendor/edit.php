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
                                    <li class="breadcrumb-item"><a href="javascript:">Update</a></li>
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
                                        <h5>Update Vendors</h5>
                                        <a href="<?php echo base_url('admin/Vendors/data') ?>"
                                            class="btn shadow-2 btn-primary pull-right">Data</a>
                                    </div>
                                    <?php 
                                    $id = $this->uri->segment(4);
                                    $this->db->where('id', $id);
                                    $row = $this->db->get('data_vendor')->row();
                                    ?>
                                    <form id="input_data">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" class="form-control"
                                                            value="<?= @$row->nama_perusahaan ?>" name="nama_perusahaan"
                                                            placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" required name="nama"
                                                            value="<?php echo @$row->nama ?>" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="tel" class="form-control" required name="phone"
                                                            value="<?php echo @$row->phone ?>" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" required name="email"
                                                            value="<?php echo @$row->email ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea type="text" class="form-control form-textarea"
                                                            name="alamat" placeholder="Alamat"
                                                            required><?= @$row->alamat ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea type="text" class="form-control form-textarea"
                                                            name="ket" placeholder="Keterangan"
                                                            required><?= @$row->ket ?></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?= @$row->id ?>">
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
        $(document).ready(function () {
            $('#input_data').on('submit', function (e) {
                e.preventDefault();
                // $('#content_berita').val($('#berita').summernote('code'));

                $('.loading').show();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Vendors/edit_data') ?>",
                    cache: false,
                    enctype: 'multipart/form-data',
                    data: new FormData($('#input_data')[0]),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.msg == 'success') {
                            $('.sukses_menyimpan').click();
                            setTimeout(function () {
                                window.location =
                                    "<?php echo base_url('admin/Vendors/data') ?>";
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
        });

    </script>
