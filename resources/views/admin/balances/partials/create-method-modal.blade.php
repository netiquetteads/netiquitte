<!-- Modal -->
<div id="createMethodModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <form id="methodTypeForm">
            @csrf
             <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create a new method</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="methodName">Name</label>
                <input type="text" name="name" id="methodName" class="form-control">
            </div>
            <div class="col-12 border border-3 py-2">
       
                <div class="form-group selectFields">
                    <div class="form-check {{ $errors->has('account_name_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="account_name_select" id="account_name_select" value="1">
                        <label class="form-check-label" for="account_name_select">{{ trans('cruds.paymentMethod.fields.account_name_select') }}</label>
                    </div>
                    @if($errors->has('account_name_select'))
                        <span class="text-danger">{{ $errors->first('account_name_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_select_helper') }}</span>
                </div>
                <div class="form-group selectFields">
                    <div class="form-check {{ $errors->has('account_num_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="account_num_select" id="account_num_select" value="1">
                        <label class="form-check-label" for="account_num_select">{{ trans('cruds.paymentMethod.fields.account_num_select') }}</label>
                    </div>
                    @if($errors->has('account_num_select'))
                        <span class="text-danger">{{ $errors->first('account_num_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_num_select_helper') }}</span>
                </div>
                <div class="form-group selectFields">
                    <div class="form-check {{ $errors->has('routing_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="routing_select" id="routing_select" value="1">
                        <label class="form-check-label" for="routing_select">{{ trans('cruds.paymentMethod.fields.routing_select') }}</label>
                    </div>
                    @if($errors->has('routing_select'))
                        <span class="text-danger">{{ $errors->first('routing_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_select_helper') }}</span>
                </div>
                <div class="form-group selectFields" id="swift_select_div">
                    <div class="form-check {{ $errors->has('swift_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="swift_select" id="swift_select" value="1">
                        <label class="form-check-label" for="swift_select">{{ trans('cruds.paymentMethod.fields.swift_select') }}</label>
                    </div>
                    @if($errors->has('swift_select'))
                        <span class="text-danger">{{ $errors->first('swift_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_select_helper') }}</span>
                </div>
                <div class="form-group selectFields">
                    <div class="form-check {{ $errors->has('notes_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="notes_select" id="notes_select" value="1">
                        <label class="form-check-label" for="notes_select">{{ trans('cruds.paymentMethod.fields.notes_select') }}</label>
                    </div>
                    @if($errors->has('notes_select'))
                        <span class="text-danger">{{ $errors->first('notes_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_select_helper') }}</span>
                </div>
                <div class="form-group selectFields">
                    <div class="form-check {{ $errors->has('paypal_email_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="paypal_email_select" id="paypal_email_select" value="1">
                        <label class="form-check-label" for="paypal_email_select">{{ trans('cruds.paymentMethod.fields.paypal_email_select') }}</label>
                    </div>
                    @if($errors->has('paypal_email_select'))
                        <span class="text-danger">{{ $errors->first('paypal_email_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_select_helper') }}</span>
                </div>
               
                <div class="form-group selectFields" id="custom_email_select_div">
                    <div class="form-check {{ $errors->has('custom_email_select') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="custom_email_select" id="custom_email_select" value="1">
                        <label class="form-check-label" for="custom_email_select">{{ trans('cruds.paymentMethod.fields.custom_email_select') }}</label>
                    </div>
                    @if($errors->has('custom_email_select'))
                        <span class="text-danger">{{ $errors->first('custom_email_select') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_select_helper') }}</span>
                </div>
               
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success" id="submitMethodType">Save</button>
        </div>
    </div>
        </form>

    </div>
</div>