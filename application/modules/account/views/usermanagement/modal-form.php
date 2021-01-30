<div id="modalForm" class="modal modal-color-scheme fade bs-modal-lg-color-scheme" tabindex="-1" aria-hidden="true" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        
        <div class="modal-content">

            <form id="fData">
            <input type="hidden" id="did" value="" />
            <input type="hidden" id="dmode" value="add" />
            <div class="modal-header text-inverse">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                <h5 class="modal-title" id="myLargeModalLabel">Form User Approvers</h5>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Approver Name</label>
                    <div class="col-md-7">
                        <select class="m-b-10 form-control" id="approver" data-placeholder="Choose" data-toggle="select2">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Position As</label>
                    <div class="col-md-9">
                        <input type="text" id="approver_as" class="form-control" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Approval Level</label>
                    <div class="col-md-3">
                        <input type="number" id="approver_level" class="form-control" />
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info ripple text-left" onclick="Page.SaveApprover()">Add / Modify Approver</button> 
                <button type="button" class="btn btn-danger ripple text-left" data-dismiss="modal">Cancel</button>
            </div>

            </form>

        </div>
    
    </div>
</div>