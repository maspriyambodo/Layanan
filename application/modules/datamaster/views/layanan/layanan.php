<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.7/kt-2.5.3/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.7/kt-2.5.3/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <form action="<?php echo base_url('datamaster/Layanan/Add/'); ?>" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" style="width:100%;">
                        <thead class="text-center text-uppercase">
                            <tr>
                                <th>no</th>
                                <th>nama layanan</th>
                                <th>direktorat</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td><input type="text" name="nama" class="form-control" required="" autocomplete="off"/></td>
                                <td>
                                    <select name="kategori" class="form-control custom-select" required="">
                                        <option value="">Pilih Layanan Direktorat</option>
                                        <?php
                                        foreach ($kategori as $b) {
                                            echo '<option value="' . $b->id . '">' . $b->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-xs btn-icon btn-bg-light btn-icon-success btn-hover-success" title="Save"><i class="far fa-save"></i></button>
                                </td>
                            </tr>
                            <?php foreach ($layanan as $a) { ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        static $id = 1;
                                        echo $id++;
                                        ?>
                                    </td>
                                    <td><?php echo $a->nama_layanan; ?></td>
                                    <td><?php echo $a->nama; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-xs btn-icon btn-bg-light btn-icon-success btn-hover-warning" title="Edit Layanan" data-toggle="modal" data-target="#edit" onclick="Edit('<?php echo $a->id; ?>', '<?php echo $a->nama_layanan; ?>')"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-xs btn-icon btn-bg-light btn-icon-success btn-hover-danger" title="Hapus Layanan" data-toggle="modal" data-target="#hapus" onclick="Hapus('<?php echo $a->id; ?>')"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Hapus(id) {
        $('input[name="h_id"]').val(id);
    }
    function Edit(id, nama) {
        $('input[name="e_id"]').val(id);
        $('input[name="e_nama"]').val(nama);
    }
    window.onload = function () {
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
            "ordering": true,
            "info": true,
            "processing": false,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>