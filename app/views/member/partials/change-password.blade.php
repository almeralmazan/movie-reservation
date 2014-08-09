<div class="modal fade" id="myModal-change-pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            {{ Form::open(['url' => 'member/change-password', 'id' => 'change-password-form', 'class' => 'form-horizontal']) }}
                <div class="modal-body">
                    <label for="old-password">Current Password</label>
                    <input type="password" id="old-password" name="current_password" class="form-control" required>

                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new_password" class="form-control" required>

                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                    <div style="color: red; margin-top: 20px" id="change-password-error" class="hidden text-left"></div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
