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
Page.RefreshGrid = function(){
    Page.InitGrid();
};
Page.Edit = function(id){
    window.location.href = '<?php echo base_url(); ?>account/usermanagement/form/'+ id;
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
            var url = '<?php echo base_url(); ?>account/usermanagement/delete';
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
                url: '<?php echo base_url(); ?>account/usermanagement/getdata/',
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
                window.location.href = '<?php echo base_url(); ?>account/usermanagement/form';
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
            index: 'username',
            title: 'User ID',
            width: 160,
        }, {
            index: 'fullname',
            title: 'Fullname',
            width: 180,
        }, {
            index: 'email',
            title: 'Email',
            width: 220,
        }, {
            index: 'user_group',
            title: 'User Group',
            width: 160,
        }, {
            index: 'id',
            title: 'Control',
            ellipsis: false,
            width: 120,
            render: function(o) {
                o.value = (o.data.username=='admin'?'':'<a href="javascript:;" onclick="Page.Delete(\''+ o.value +'\')" class="text-danger"><i class="fa fa-remove"></i></a>')+
                    '&nbsp;&nbsp;<a href="javascript:;" onclick="Page.Edit(\''+ o.value +'\')" class="text-warning"><i class="fa fa-pencil"></i></a>';

                return o;
            },
        }],
    }); 
};

$(function(){
    Page.InitGrid();
});
</script>
{JS END}