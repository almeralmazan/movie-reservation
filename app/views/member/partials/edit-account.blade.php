<!-- Modal -->
<div class="modal fade" id="myModal-edit-account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Account</h4>
            </div>
            {{ Form::open(['url' => 'member/update-account', 'class' => 'form-horizontal']) }}
                <div class="modal-body">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" class="form-control" value="{{ $member->first_name }}">

                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" class="form-control" value="{{ $member->last_name }}">

                        <label for="contact-no">Contact #</label>
                        <input type="text" id="contact-no" name="mobile_number" class="form-control" value="{{ $member->mobile_number }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
