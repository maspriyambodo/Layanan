<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <br>
            {CONTENT BLOCK}

        </div>
    </div>
</div>

{JS START}
<?php
echo $js_inlines;
?>
<script type="text/javascript">
    var Page = {};
    Page.RefreshGrid = function() {
        Page.InitGrid();
    };
    Page.InitGrid = function() {
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
                    url: '<?php echo base_url(); ?>operator/zawaf/joinan_laz',
                    params: {}
                },
            },
            trackOver: true,
            selModel: {
                type: 'rows',
                memory: true
            },
            tbar: [{
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
                    handler: function() {
                        // alert("add")
                        window.location.href = '<?php echo site_url("datamaster/address/form_provinsi"); ?>';
                    },
                }, <?php endif; ?>],
            paging: true,
            defaults: {
                type: 'string',
                width: 100,
                sortable: true,
                resizable: true,
                ellipsis: true
            },
            columns: [{
                    index: 'id',
                    title: 'No.',
                    width: 50,
                    // locked: true,
                    cellAlign: 'right',
                    render: function(o) {
                        // console.log(o);
                        o.value = (o.item.$index + 1);
                        return o;
                    }
                },{
                    index: 'fullname',
                    title: 'Nama Pemohon',
                    width: 150,
                    // locked: true,
                },{
                    index: 'nama_layanan',
                    title: 'Permohonan Jenis',
                    width: 180,
                    // locked: true,
                },{
                    index: 'nm_instansi',
                    title: 'Nama Instansi',
                    width: 150,
                    // locked: true,
                },{
                    index: 'telp_instansi',
                    title: 'Telpon Instansi',
                    width: 150,
                    // locked: true,
                },
                {
                    index: 'email_instansi',
                    title: 'Email email_instansi',
                    width: 120,
                    // locked: true,
                },
                {
                    index: 'nama',
                    title: 'Provinsi Instansi',
                    width: 150,
                    // locked: true,
                },{
                    index: 'id',
                    title: 'Control',
                    ellipsis: false,
                    // width: 95,
                    // rightLocked: true,
                    render: function(o) {
                    o.style['text-align'] = 'center';
                    o.value = ''
<?php if ($this->izin->delete) : ?>
                        +
                                ('<div class="btn-group" role="group" aria-label="Control button"><a class="btn btn-default btn-xs" href="javascript:;" onclick="Page.Delete(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>')
<?php endif; ?>
<?php if ($this->izin->edit) : ?>
                        +
                                ('<a class="btn btn-default btn-xs" href="javascript:;" onclick="Page.Edit(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit"><i class="fas fa-pencil-alt text-warning"></i></a></div>') <?php endif; ?>
<?php if ($this->izin->gapunya) : ?>
                        +
                                ''
<?php endif; ?>
                    ;
                    return o;
                    },
                }
            ],
        });
    };
    Page.Delete = function(id) {
        // swal("Delete function is still under development!")
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result) {
                App.IsLoading(true);
                var data = {
                    id: id,
                };
                var url = '<?php echo base_url(); ?>operator/zawaf/hapus_dt_laz';
                ajaxPost(url, data, function(data) {
                    App.IsLoading(false);
                    swal(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    ).then(function(result) {
                        Page.InitGrid();
                    });
                }, function(data) {
                    // do nothing for unsuccess transaction
                    App.IsLoading(false);
                });
            }
        }, function(dismiss) {
            // do nothing for dismiss modal
        });
    };
    Page.Edit = function(id) {
        if (id != '') {
            window.location.href = '<?php echo base_url(); ?>operator/zawaf/editlaz/' + id;
        }
    };
    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}