<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

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
                    url: '<?php echo base_url('datamaster/Direktorat/Get_all'); ?>',
                            params: {}
                    },
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
                        handler: function() {
                        window.location.href = '<?php echo site_url("datamaster/Direktorat/Add/"); ?>';
                        },
                }, <?php endif; ?>
            ],
            paging: true,
            defaults: {
            type: 'string',
                    width: 100,
                    sortable: true,
                    resizable: true,
                    ellipsis: true,
                    align: 'center',
            },
            columns: [
            {
            index: 'nama',
                    title: 'NAMA DIREKTORAT',
                    width: 180
            },
            {
            index: 'keterangan',
                    title: 'KETERANGAN',
                    width: 180
            },
            {
            index: 'id',
                    title: 'Control',
                    // width: 95,
                    // rightLocked: true,
                    render: function(o) {
                    o.style['text-align'] = 'center';
                    o.value = ''
<?php if ($this->izin->delete) : ?>
                        +
                                ('<a class="text-danger" href="javascript:;" onclick="Page.Delete(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Delete" style="margin-right:10px;"><i class="far fa-trash-alt"></i></a>')
<?php endif; ?>
<?php if ($this->izin->edit) : ?>
                        +
                                ('<a class="text-warning" href="javascript:;" onclick="Page.Edit(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit"><i class="fas fa-pencil-alt"></i></a>') <?php endif; ?>
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
    Page.Delete = function(id){
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
    var url = '<?php echo base_url('datamaster/Direktorat/Delete/'); ?>';
    ajaxPost(url, data, function(data){
    App.IsLoading(false);
    swal(
            'Deleted!',
            'Your data has been deleted.',
            'success'
            );
    Page.RefreshGrid();
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
    window.location.href = '<?php echo base_url('datamaster/Direktorat/Edit/'); ?>' + id;
    }
    };
    $(function() {
    Page.InitGrid();
    });
</script>
{JS END}