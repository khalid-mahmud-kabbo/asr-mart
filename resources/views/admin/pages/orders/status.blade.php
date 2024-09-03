<div class="modal-header bg-success">
    <h5 class="modal-title text-white" id="viewModalLongTitle">{{ __('Change Status') }}</h5>
    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" method="POST" action="{{ route('admin.order_status_change', encrypt($order->id)) }}">
    <div class="modal-body">
        @csrf
        <div class="input__group">
            <label for="question">{{ __('Status') }}</label>
            <select name="Order_Status" id="order-status" class="form-select">
                <option value="">{{ __('---SELECT A STATUS---') }}</option>
                <option value="{{ ORDER_PENDING }}"
                    {{ $order->Order_Status == ORDER_PENDING ? 'selected disabled' : '' }}>
                    {{ __('Pending') }}</option>
                <option value="{{ ORDER_PROCESSING }}"
                    {{ $order->Order_Status == ORDER_PROCESSING ? 'selected disabled' : '' }}>
                    {{ __('Processing') }}</option>
                <option value="{{ ORDER_SHIPPED }}"
                    {{ $order->Order_Status == ORDER_SHIPPED ? 'selected disabled' : '' }}>
                    {{ __('Shipped') }}</option>
                <option value="{{ ORDER_DELIVERED }}"
                    {{ $order->Order_Status == ORDER_DELIVERED ? 'selected disabled' : '' }}>
                    {{ __('Delivered') }}</option>
                <option value="{{ ORDER_RETURN }}"
                    {{ $order->Order_Status == ORDER_RETURN ? 'selected disabled' : '' }}>
                    {{ __('Returned') }}</option>
            </select>
        </div>



        <div class="input__group mt-4">
            <label for="question">{{ __('Delivery Option') }}</label>
            <select name="Delivary_Status" id="delivary-status" class="form-select">
                <option value="{{ DELIVARY_CHOOSE }}"
                    {{ $order->Delivary_Status == DELIVARY_CHOOSE ? 'selected disabled' : '' }}>
                    {{ __('---SELECT A Delivery Option---') }}</option>
                <option value="{{ DELIVARY_SELFMAN }}"
                    {{ $order->Delivary_Status == DELIVARY_SELFMAN ? 'selected disabled' : '' }}>
                    {{ __('By Self Delivery Man') }}</option>
                <option value="{{ DELIVARY_THIRDPARTY }}"
                    {{ $order->Delivary_Status == DELIVARY_THIRDPARTY ? 'selected disabled' : '' }}>
                    {{ __('By Third Party Delivery Service') }}</option>
            </select>
        </div>

        <div id="third-party-info" class="mt-5" style="display: none;">
            <div class="input__group mt-4">
                <label for="delivaryservicename">{{ __('Delivery Service Name') }}</label>
                <input type="text" name="delivaryservicename" id="delivaryservicename" class="form-control" value="{{ $order->delivaryservicename}}">
            </div>

            <div class="input__group mt-4">
                <label for="trackingid">{{ __('Tracking id (Optional)') }}</label>
                <input type="text" name="trackingid" id="trackingid" class="form-control" value="{{ $order->trackingid}}">
            </div>
        </div>

        <script>
            document.getElementById('delivary-status').addEventListener('change', function() {
                var thirdPartyInfo = document.getElementById('third-party-info');
                if (this.value == '{{ DELIVARY_THIRDPARTY }}') {
                    thirdPartyInfo.style.display = 'block';
                } else {
                    thirdPartyInfo.style.display = 'none';
                }
            });

            document.getElementById('delivary-status').dispatchEvent(new Event('change'));
        </script>





    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger small me-2" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="submit" class="btn btn-primary small">{{ __('Update') }}</button>
    </div>
</form>
