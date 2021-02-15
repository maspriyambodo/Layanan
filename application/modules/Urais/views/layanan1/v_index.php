<div class="card" style="margin-top:1.32857em;">
    <div class="card-body">
        {CONTENT BLOCK}
    </div>
</div>
{JS START}
<?php
echo $js_inlines;
?>
<input type="hidden" name="err_msg" value="<?php echo $msg['gagal']; ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $msg['sukses']; ?>"/>
<script type="text/javascript">
    window.onload = function () {
    toastr.options = {
    closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: false,
            extendedTimeOut: "2000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
    };
    var a, b;
    a = $('input[name="err_msg"]').val();
    b = $('input[name="succ_msg"]').val();
    if (a !== "") {
    toastr.error(a);
    } else if (b !== "") {
    toastr.success(b);
    }
    };
    var Page = {};
    Page.RefreshGrid = function () {
    Page.InitGrid();
    };
    Page.InitGrid = function () {
    $('#mejo_grid').html('');
    var grid = new FancyGrid({
    lang: {
    thousandSeparator: '.',
            decimalSeparator: ',',
            paging: {
            of: 'of [0]',
                    info: 'Show [0] - [1] of [2]',
                    page: 'Page'
            }
    },
            theme: 'blue',
            renderTo: 'mejo_grid',
            height: $('body').innerHeight() - 270,
            data: {
            pageSize: 10,
                    remoteFilter: false,
                    remoteSort: false,
                    proxy: {
                    url: '<?php echo base_url('Urais/Layanan_1/Get_all?id=1&jenis_layanan=1'); ?>'
                    }
            },
            trackOver: true,
            selModel: {
            type: 'rows',
                    memory: true
            },
            tbar: [
            {
            type: 'search',
                    width: 350,
                    emptyText: 'Search',
                    paramsMenu: true,
                    paramsText: 'Columns'
            },
<?php if ($this->izin->add): ?>{
                type: 'button',
                        text: '<i class="fa fa-plus-circle" style="margin:0px 5px;clear:both;"></i>Tambah Baru',
                        cls: 'mejo-btn mejo-btn-blue',
                        width: 120,
                        handler: function() {
                        // alert("add")
                        window.location.href = '<?php echo base_url('Urais/Layanan_1/Tambah/'); ?>';
                        }
                },<?php endif; ?>
<?php if ($this->izin->publish): ?>{
                type: 'button',
                        text: '<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export Data',
                        cls: 'mejo-btn mejo-btn-green',
                        width: 120
                }<?php endif; ?>
            ],
            paging: true,
            defaults: {
            type: 'string',
                    width: 100,
                    sortable: true,
                    resizable: true,
                    ellipsis: true,
                    align: 'center'
            },
            columns: [
            {
            index: 'id_layanan',
                    title: 'NO FORM',
                    width: 150,
                    render: function(o) {
                    o.style['text-align'] = 'center';
                    var a, b, c;
                    a = o.data.no_direktorat;
                    b = o.data.no_layanan;
                    c = o.data.tgl_input;
                    o.value = a + '.' + b + '.' + c + '.' + o.data.no_urut;
                    return o;
                    }
            },
            {
            index: 'nm_keg',
                    title: 'JUDUL',
                    width: 500
            },
            {
            index: 'keterangan',
                    title: 'KETERANGAN',
                    width: 200
            },
            {
            index: 'tgl_daftar',
                    title: 'TMT PENGAJUAN',
                    width: 200,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'tgl_awal_keg',
                    title: 'TMT PELAKSANAAN',
                    width: 200,
                    rightLocked: true,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'id_layanan',
                    title: 'CONTROL',
                    width: 150,
                    rightLocked: true,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    o.value = ''
<?php if ($this->izin->delete): ?>
                        + ('<a class="text-danger" href="javascript:;" onclick="Page.Hapus(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Hapus Permohonan" style="margin:0px 10px;"><i class="fas fa-trash"></i></a>')
<?php endif; ?>
<?php if ($this->izin->edit): ?>
                        + ('<a class="text-warning" href="javascript:;" onclick="Page.Edit(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit Permohonan" style="margin:0px 10px;"><i class="far fa-edit"></i></a>' + '<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Detail Permohonan"><i class="far fa-eye"></i></a>');
<?php endif; ?>
<?php if ($this->izin->gapunya): ?>
                        + ''
<?php endif; ?>
                    return o;
                    }
            }
            ]
    });
    };
    Page.Hapus = function(id) {
    swal({
    title: 'Apakah anda yakin?',
            text: "data yang telah dihapus tidak dapat dikembalikan!",
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Tidak',
            allowOutsideClick: false
    }).then(function (result) {
    if (result) {
    App.IsLoading(true);
    var data = {
    id: id
    };
    var url = '<?php echo base_url('Urais/Layanan_1/Hapus/'); ?>';
    ajaxPost(url, data, function (data) {
    App.IsLoading(false);
    if (data.success === false) {
    swal({
    title: '<strong>Error</strong>',
            type: 'error',
            text: "Surat Permohonan gagal dihapus",
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: 'OK',
            allowOutsideClick: false
    });
    } else {
    swal({
    title: '<strong>Success</strong>',
            type: 'success',
            text: "Surat Permohonan berhasil dihapus",
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: 'OK',
            allowOutsideClick: false
    }).then(function (isConfirm) {
    if (isConfirm) {
    Page.InitGrid();
    }
    });
    }
    });
    }
    });
    };
    Page.Detail = function (id) {
    window.location.href = '<?php echo base_url('Urais/Layanan_1/Detail/'); ?>' + id;
    };
    Page.Edit = function (id) {
    window.location.href = '<?php echo base_url('Urais/Layanan_1/Edit/'); ?>' + id;
    };
    $(function () {
    Page.InitGrid();
    });
</script>
{JS END}