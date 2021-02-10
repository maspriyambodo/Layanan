<div class="card mt-4">
    <div class="card-body">
        {CONTENT BLOCK}
    </div>
</div>
{JS START}
<?php
echo $js_inlines;
?>
<script type="text/javascript">
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
                    url: '<?php echo base_url('Urais/Layanan_1/Get_all?id=2&jenis_layanan=1'); ?>',
                            params: {}
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
<?php if ($this->izin->add): ?>{},<?php endif; ?>
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
                    width: 350
            },
            {
            index: 'keterangan',
                    title: 'KETERANGAN',
                    width: 400
            },
            {
            index: 'tgl_daftar',
                    title: 'TMT PENGAJUAN',
                    width: 150,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'tgl_awal_keg',
                    title: 'TMT PELAKSANAAN',
                    width: 150,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'tgl_proses',
                    title: 'TMT VERIFIKASI',
                    width: 150,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'lama',
                    title: 'WAKTU PROSES / hari',
                    width: 150,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    return o;
                    }
            },
            {
            index: 'nama_stat',
                    title: 'STATUS PERMOHONAN',
                    width: 150,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    o.value = '' + ('<div class="fancy-grid-cell-inner" style="margin-top:0px !important;"><span class="badge badge-orange">Dalam proses</span></div>');
                    return o;
                    }
            },
            {
            index: 'id_layanan',
                    title: 'CONTROL',
                    // width: 95,
                    // rightLocked: true,
                    render: function (o) {
                    o.style['text-align'] = 'center';
                    o.value = ''
<?php if ($this->izin->delete): ?>
                        + ''
<?php endif; ?>
<?php if ($this->izin->edit): ?>
                        + ('<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Detail" style="margin-right:10px;"><i class="far fa-eye"></i></a>');
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
    Page.Detail = function (id) {
    window.location.href = '<?php echo base_url('Urais/Layanan_1/Detail_Proses/'); ?>' + id;
    };
    $(function () {
    Page.InitGrid();
    });
</script>
{JS END}