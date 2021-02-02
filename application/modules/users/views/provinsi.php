<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <!-- <div class="row">
                <div class="col-md-12">
                    <select id="filter_provinsi" class="w200 display-inline form-control" onchange="Page.SetFilterKabupaten()">
                        <option value="">- Provinsi -</option>
                        <?php foreach ($provinsi as $p) : ?>
                            <option value="<?php echo $p->provinsi_id ?>"><?php echo $p->provinsi_name ?></option>
                        <?php endforeach; ?>
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
                    url: '<?php echo base_url(); ?>datamaster/address/populateProvincesAllAttributes',
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
                    index: 'id_provinsi',
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
                    index: 'nama',
                    title: 'Nama Provinsi',
                    width: 150,
                    // locked: true,
                },
                {
                    index: 'id_provinsi',
                    title: 'Kode Provinsi',
                    width: 150,
                    // locked: true,
                },
                {
                    index: 'is_actived',
                    title: 'Status',
                    width: 150,
                    // locked: true,
                },
                {
                    index: 'provinsi_lat',
                    title: 'Latitude',
                    width: 150,
                    // locked: true,
                },
                {
                    index: 'provinsi_long',
                    title: 'Longitude',
                    width: 150,
                    // locked: true,
                }, {
                    index: 'provinsi_id',
                    title: 'Control',
                    ellipsis: false,
                    // width: 95,
                    // rightLocked: true,
                    render: function(o) {
                        o.value = ''
                        <?php if ($this->izin->delete) : ?>
                                +
                                ('<a class="text-danger" href="javascript:;" onclick="Page.Remove(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Delete"><i class="fa fa-remove"></i></a>')
                        <?php endif; ?>
                        <?php if ($this->izin->edit) : ?>
                                +
                                ('&nbsp;&nbsp;<a class="text-warning" href="javascript:;" onclick="Page.Edit(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit"><i class="fa fa-pencil"></i></a>') <?php endif; ?>
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
    Page.Remove = function(id) {
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
                var url = '<?php echo base_url(); ?>datamaster/address/delete_provinsi';
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
            window.location.href = '<?php echo base_url(); ?>datamaster/address/form_provinsi/' + id;
        }
    };
    Page.Remove = function(id) {
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
                var url = '<?php echo base_url(); ?>datamaster/address/delete_provinsi';
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
    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}