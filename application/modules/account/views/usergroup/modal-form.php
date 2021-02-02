<div id="modalForm" class="modal modal-color-scheme fade bs-modal-lg-color-scheme" tabindex="-1" aria-hidden="true" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        
        <div class="modal-content">

            <form id="fData">
            <input type="hidden" id="fid" value="" />
            <input type="hidden" id="fmode" value="add" />
            <div class="modal-header text-inverse">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                <h5 class="modal-title" id="myLargeModalLabel">Form User Group</h5>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Group Name</label>
                    <div class="col-md-7">
                        <input type="text" id="name" class="form-control" required data-vindicate="required" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                        <textarea id="description" class="form-control" rows="2"></textarea>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info ripple text-left" onclick="Page.Save()">Save</button> 
                <button type="button" class="btn btn-danger ripple text-left" data-dismiss="modal">Cancel</button>
            </div>

            </form>

        </div>
    
    </div>
</div>