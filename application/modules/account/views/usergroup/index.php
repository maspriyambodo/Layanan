<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

            {CONTENT BLOCK}

        </div>
    </div>
</div>
<a class="d-none" href="javascript:void(0)" id="openForm" data-toggle="modal" data-target="#modalForm">asdasdasd</a>
<a class="d-none" href="javascript:void(0)" id="openAccess" data-toggle="modal" data-target="#modalAccess">rertert</a>

{JS START}
<?php
require_once("modal-form.php");
require_once("modal-access.php");
?>
<?php
echo $js_inlines;
?>
<script type="text/javascript">
var Page = {};
Page.RefreshGrid = function(){
    Page.InitGrid();
};
Page.ShowFormData = function(tipe){
    // $('#modalForm').modal(tipe);
    if(tipe=='show') {
        window.document.getElementById('openForm').click();
    } else {
        try {
            $('#modalForm').find('[data-dismiss="modal"]').click()
        } catch(e) {}
    }
};
Page.OpenFormData = function(){
    Page.ShowFormData('show');
};
Page.CloseFormData = function(){
    Page.ShowFormData('hide');
};
Page.ResetFormData = function(){
    $('#fid').val('');
    $('#fmode').val('add');
    $('#name').prop('readonly', false);
    $('#name').val('');
    $('#name').focus();
    $('#description').val('');
};
Page.Add = function(){
    Page.ResetFormData();
    Page.OpenFormData();
};
Page.Edit = function(id){
    App.IsLoading(true);
    Page.ResetFormData();
    $('#fid').val(id);
    $('#fmode').val('edit');
    Page.SetData(id);
    Page.OpenFormData();
};
Page.SetData = function(id) {
    var data = {
        id: id,
    };
    var url = '<?php echo base_url(); ?>account/usergroup/getdatagroup';
    ajaxPost(url, data, function(data){
        if(id<=1) {
            $('#name').prop('readonly', true);
        }
        $('#name').val(data.name);
        $('#description').val(data.description);
        App.IsLoading(false);
    }, function(data) {
        // do nothing for unsuccess transaction
        App.IsLoading(false);
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
            var url = '<?php echo base_url(); ?>account/usergroup/delete';
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
Page.Save = function(){
    var data = {
        id: $('#fid').val(),
        mode: $('#fmode').val(),
        name: $('#name').val(),
        description: $('#description').val(),
    };
    var url = '<?php echo base_url(); ?>account/usergroup/save';
    ajaxPost(url, data, function(data){
        App.IsLoading(false);
        swal(
            'Success!',
            'Your data has been saved.',
            'success'
        );
        Page.CloseFormData();
        Page.RefreshGrid();
    }, function(data) {
        // do nothing for unsuccess transaction
        App.IsLoading(false);
    });
};

Page.Access = function(id){
    Page.ResetAccess();
    Page.SetAccess(id);
    $('#fid_group').val(id);
    Page.OpenFormAccess();
};
Page.ResetAccess = function() {
    $('.cb-access').prop('checked', false);
};
Page.SetAccess = function(id) {
    var data = {
        id: id,
    };
    var url = '<?php echo base_url(); ?>account/usergroup/getgroupaccess';
    ajaxPost(url, data, function(data){
        if(data.length > 0) {
            $.each(data, function(i, dt){
                var id = dt.id_menu;
                var v = dt.is_view;
                var a = dt.is_add;
                var e = dt.is_edit;
                var d = dt.is_delete;
                var r = dt.is_approve;
                var p = dt.is_publish;

                $('#cb-menu-v-'+id).prop('checked', (v==1));
                $('#cb-menu-a-'+id).prop('checked', (a==1));
                $('#cb-menu-e-'+id).prop('checked', (e==1));
                $('#cb-menu-d-'+id).prop('checked', (d==1));
                $('#cb-menu-r-'+id).prop('checked', (r==1));
                $('#cb-menu-p-'+id).prop('checked', (p==1));
            });
        }
    }, function(data) {
        // do nothing for unsuccess transaction
    });
};
Page.ShowFormAccess = function(tipe){
    // $('#modalAccess').modal(tipe);
    if(tipe=='show') {
        window.document.getElementById('openAccess').click();
    } else {
        $('#modalAccess').find('[data-dismiss="modal"]').click()
    }
};
Page.OpenFormAccess = function(){
    Page.ShowFormAccess('show');
};
Page.CloseFormAccess = function(){
    Page.ShowFormAccess('hide');
};
Page.SaveAccess = function(){
    var eIds = $('input[name=id_menu]');
    var accesses = [];

    $.each(eIds, function(i, e){
        var id_menu = $(e).val();
        var item = {
            id_menu: id_menu,
            view: ($('#cb-menu-v-'+id_menu).is(':checked')?1:0),
            add: ($('#cb-menu-a-'+id_menu).is(':checked')?1:0),
            edit: ($('#cb-menu-e-'+id_menu).is(':checked')?1:0),
            delete: ($('#cb-menu-d-'+id_menu).is(':checked')?1:0),
            approve: ($('#cb-menu-r-'+id_menu).is(':checked')?1:0),
            publish: ($('#cb-menu-p-'+id_menu).is(':checked')?1:0),
        };
        accesses.push(item);
    });

    var data = {
        id: $('#fid_group').val(),
        accesses: accesses,
    };
    var url = '<?php echo base_url(); ?>account/usergroup/saveaccess';
    ajaxPost(url, data, function(data){
        App.IsLoading(false);
        swal(
            'Success!',
            'Your data has been saved.',
            'success'
        );
        Page.CloseFormAccess();
    }, function(data) {
        // do nothing for unsuccess transaction
        App.IsLoading(false);
    });
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
            proxy: {
                url: '<?php echo base_url(); ?>account/usergroup/getdata/',
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
        },{
            type: 'button',
            text: '<i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Tambah Baru',
            cls: 'mejo-btn mejo-btn-blue',
            width: 120,
            handler: function() {
                Page.Add();
            },
        },
        // {
        //     type: 'button',
        //     text: '<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export to Xls',
        //     cls: 'mejo-btn mejo-btn-green',
        //     width: 120,
        //     handler: function() {
        //         console.log('ok press export');
        //     },
        // }
        ],
        paging: true,
        defaults: {
            type: 'string',
            width: 100,
            sortable: true,
            resizable: true,
            ellipsis: true
        },
        columns: [{
            index: 'nomor',
            title: 'No.',
            width: 60,
        }, {
            index: 'id',
            title: 'User Group ID',
            width: 110,
        }, {
            index: 'name',
            title: 'User Group',
            width: 160,
        }, {
            index: 'description',
            title: 'Description',
            width: 320,
        }, {
            index: 'id',
            title: 'Control',
            ellipsis: false,
            width: 120,
            render: function(o) {
                o.value = (o.value>1?'<a href="javascript:;" onclick="Page.Delete(\''+ o.value +'\')" class="text-danger"><i class="fa fa-minus-circle"></i></a>':'&nbsp;&nbsp;&nbsp;')+
                    '&nbsp;&nbsp;<a href="javascript:;" onclick="Page.Edit(\''+ o.value +'\')" class="text-warning"><i class="fa fa-edit"></i></a>'+
                    '&nbsp;&nbsp;<a href="javascript:;" onclick="Page.Access(\''+ o.value +'\')" class="text-default"><i class="fa fa-cog"></i></a>';

                return o;
            },
        }],
    }); 
}
</script>
<script type="text/javascript">
    $(function(){
        Page.InitGrid();
    });
</script>

{JS END}