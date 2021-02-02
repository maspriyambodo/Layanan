<div class="card" style="margin-top:1.32857em;">
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
                    url: '<?php echo base_url('Urais/Layanan_1/Get_all'); ?>',
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
                }, <?php if ($this->izin->add) : ?> {
                        type: 'button',
                        text: '<i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Tambah Baru',
                        cls: 'mejo-btn mejo-btn-blue',
                        width: 120,
                        handler: function () {
                            window.location.href = '<?php echo site_url("datamaster/Status/Tambah/"); ?>';
                        }
                    }, <?php endif; ?>
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
                    index: 'nm_keg',
                    title: 'JUDUL',
                    width: 500
                },
                {
                    index: 'tgl_awal_keg',
                    title: 'PELAKSANAAN',
                    width: 200,
                    render: function (o) {
                        o.style['text-align'] = 'center';
                        return o;
                    }
                },
                {
                    index: 'keterangan',
                    title: 'KETERANGAN',
                    width: 200
                },
                {
                    index: 'id_layanan',
                    title: 'Control',
                    // width: 95,
                    // rightLocked: true,
                    render: function (o) {
                        o.style['text-align'] = 'center';
                        o.value = '' + ('<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Detail" style="margin-right:10px;"><i class="far fa-eye"></i></a>');
                        return o;
                    }
                }
            ]
        });
    };
    Page.Detail = function (id) {
        window.location.href = '<?php echo base_url('Urais/Layanan_1/Detail/'); ?>' + id;
    };
    $(function () {
        Page.InitGrid();
    });
</script>
{JS END}