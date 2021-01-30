<div id="modalAccess" class="modal modal-primary fade bs-modal-lg-primary" tabindex="-1" aria-hidden="true" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-lg-75">
        
        <div class="modal-content">
            <div class="modal-header text-inverse">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                <h5 class="modal-title" id="myLargeModalLabel">Menu Group Access</h5>
            </div>
            <div class="modal-body">
                <form id="formAccess">
                    <input type="hidden" id="fid_group" value="" />
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Menu</th>
                                        <th width="100">View</th>
                                        <th width="100">Add</th>
                                        <th width="100">Edit</th>
                                        <th width="100">Delete</th>
                                        <th width="100">Approve</th>
                                        <th width="100">Publish (Export)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(count($menus) > 0):
                                        $nomer = 0;
                                        foreach($menus as $m):
                                            $nomer++;
                                            $id = $m['id'];
                                            $level = $m['menu_level'];
                                            $prefMenu = "";
                                            for($i=0;$i<$level;$i++) {
                                                $prefMenu .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                            }
                                            $menu = $prefMenu . $m['menu'];
                                            $access = $m["access_pref"];
                                            $is_view = substr($access, 0, 1);
                                            $is_add = substr($access, 1, 1);
                                            $is_edit = substr($access, 2, 1);
                                            $is_delete = substr($access, 3, 1);
                                            $is_approve = substr($access, 4, 1);
                                            $is_publish = substr($access, 5, 1);
                                    ?>
                                    <tr>
                                        <td><?php echo $nomer; ?><input type="hidden" id="id_menu_<?php echo $id; ?>" name="id_menu" value="<?php echo $id; ?>" /></td>
                                        <td><?php echo $menu; ?></td>
                                        <td align="center">
                                            <?php if($is_view): ?>
                                            <input type="checkbox" class="cb-access cb-access-view" name="cb-menu-v" id="cb-menu-v-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if($is_add): ?>
                                            <input type="checkbox" class="cb-access cb-access-add" name="cb-menu-a" id="cb-menu-a-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if($is_edit): ?>
                                            <input type="checkbox" class="cb-access cb-access-edit" name="cb-menu-e" id="cb-menu-e-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if($is_delete): ?>
                                            <input type="checkbox" class="cb-access cb-access-delete" name="cb-menu-d" id="cb-menu-d-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if($is_approve): ?>
                                            <input type="checkbox" class="cb-access cb-access-approve" name="cb-menu-r" id="cb-menu-r-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td align="center">
                                            <?php if($is_publish): ?>
                                            <input type="checkbox" class="cb-access cb-access-publish" name="cb-menu-p" id="cb-menu-p-<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info ripple text-left" onclick="Page.SaveAccess()">Save Group Access</button> 
                <button type="button" class="btn btn-danger ripple text-left" data-dismiss="modal">Close</button>
            </div>

        </div>
    
    </div>
</div>