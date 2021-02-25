<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <!-- <div class="row">
                <div class="col-md-12">
                    <select id="filter_provinsi" class="w200 display-inline form-control" onchange="Page.SetFilterKabupaten()">
                        <option value="">- Provinsi -</option>
                        <?php //foreach ($provinsi as $p) : ?>
                            <option value="<?php //echo $p->provinsi_id ?>"><?php //echo $p->provinsi_name ?></option>
                        <?php //endforeach; ?>
                    </select>
                    <select id="filter_kabupaten" class="w300 display-inline form-control">
                        <option value="">- Kabupaten/Kota -</option>
                    </select>
                    <button onclick="Page.RefreshGrid()" class="btn btn-xs btn-success" type="button"><i class="fa fa-refresh"></i> Filter</button>
                </div>
                <div class="clearfix"></div>
            </div> -->

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
                    url: '<?php echo base_url(); ?>Urais/Layanan_3/Joinan_binsyar',
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
                        window.location.href = '<?php echo site_url("Urais/Layanan_3/Tambah"); ?>';
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
                    locked: true,
                    cellAlign: 'center',
                    render: function(o) {
                        // console.log(o);
                        o.value = (o.item.$index + 1);
                        return o;
                    }
                },{
                    index: 'kode',
                    title: 'ID Formulir',
                    ellipsis: false,
                    width: 118,
                    locked: true,
                    render: function(o) {
                    // console.log("o adalah == ",o);
                    var card = '<a class="text-danger" href="javascript:;" onclick="Page.Detail(\'' + o.data.id + '\')" data-toggle="tooltip" data-html="true" title="Detail Permohonan">'+o.value+'</a>'
                    
                    o.value = card;
                    return o;
                }
                },{
                    index: 'fullname',
                    title: 'Nama Pemohon',
                    width: 110,
                    // locked: true,
                },{
                    index: 'nik',
                    title: 'NIK Pemohon',
                    width: 120,
                    // locked: true,
                },{
                    index: 'nama_layanan',
                    title: 'Jenis Layanan',
                    width: 200,
                    // locked: true,
                },{
                    index: 'nm_keg',
                    title: 'Nama Kegiatan',
                    width: 165,
                    // locked: true,
                },
                {
                    index: 'tgl_awal_keg',
                    title: 'Awal Kegiatan',
                    width: 90,
                    // locked: true,
                    cellAlign: 'center',
                },
                {
                    index: 'tgl_akhir_keg',
                    title: 'Akhir Kegiatan',
                    width: 90,
                    // locked: true,
                    cellAlign: 'center',
                },
                {
                    index: 'esti_keg',
                    title: 'Estimasi Jamaah',
                    width: 110,
                    // locked: true,
                    cellAlign: 'center',
                },
                {
                    index: 'jumlah',
                    title: 'Penceramah',
                    width: 80,
                    cellAlign: 'center',
                    rightLocked: true,
                },
                {
                    index: 'nama_stat',
                    title: 'Status',
                    width: 150,
                    rightLocked: true,
                },
                {
                    index: 'id',
                    title: 'Control',
                    cellAlign: 'center',
                    ellipsis: false,
                    width: 150,
                    rightLocked: true,
                    render: function(o) {
                    o.style['text-align'] = 'center';
                    o.value = ''
<?php if ($this->izin->delete) : ?>
                        +
                                ('<a class="btn btn-default btn-xs" href="javascript:;" onclick="Page.Proses(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Proses Permohonan"><i class="fa fa-check text-success"></i></a></div> <a class="btn btn-default btn-xs" href="javascript:;" onclick="Page.Edit(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit Permohonan"><i class="fas fa-pencil-alt text-warning"></i></a></div>')
<?php endif; ?>
<?php if ($this->izin->edit) : ?>
                        +
                                ('<div class="btn-group" role="group" aria-label="Control button"><a class="btn btn-default btn-xs" href="javascript:;" onclick="Page.Delete(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Delete Permohonan" style="background:;"><i class="far fa-trash-alt text-danger"></i></a>')
<?php endif; ?>
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
        // console.log(id);
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
                var url = '<?php echo base_url(); ?>Urais/Layanan_3/Hapuss';
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
    Page.Edit = function(id){
        // console.log(id);
        if (id != '') {
            window.location.href = '<?php echo base_url(); ?>Urais/Layanan_3/Edit/' + id;
        }
    };
    Page.Detail = function (id){
        // console.log(id);
    window.location.href = '<?php echo base_url('Urais/Layanan_3/Details/'); ?>' + id;
    };
    Page.Proses = function(id) {
        // swal("Delete function is still under development!")
        // console.log(id);
        swal({
            title: 'Yakin Ingin Merubah Status?',
            text: "Permohonan Masuk Menjadi Diproses",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi'
        }).then(function(result) {
            if (result) {
                App.IsLoading(true);
                var data = {
                    id: id,
                };
                var url = '<?php echo base_url(); ?>Urais/Layanan_3/DiProses';
                ajaxPost(url, data, function(data) {
                    App.IsLoading(false);
                    swal(
                        'Selamat!',
                        'Status Diperbaharui Menjadi Diproses.',
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
    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}