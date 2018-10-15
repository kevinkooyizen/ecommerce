@extends('layouts.app')

@section('content')
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-12">
        <div class="checkout_details_area mt-50 clearfix">
          @if (!$orders->isEmpty())
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="20%"></th>
                  <th width="40%">Name</th>
                  <th width="20%">Price</th>
                  <th width="10%">Status</th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr style="max-height: 200px;">
                    <td><img src="{{ $order->item->primary_image }}"></td>
                    <td>{{ $order->item->name }}</td>
                    <td>{{ $order->item->price }}</td>
                    <td>{{ $order->status->name }}</td>
                    <td>
                      @if ($order->status_id == \App\Models\Status::getStatus('Paid')->id && $order->received)
                        Received
                      @elseif ($salesOrPurchases == "purchase-requests" && $order->status_id != \App\Models\Status::getStatus('Accepted')->id)
                        @if ($salesOrPurchases == "purchase-requests" && $order->status_id == \App\Models\Status::getStatus('Paid')->id)
                          {!! Form::open(['url' => "orders/$order->id", 'method' => 'PUT']) !!}
                            <input type="hidden" name="received" value="1">
                            <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                            <button class="btn btn-success">Received Item</button>
                          {{ Form::close() }}
                        @elseif ($order->status_id != \App\Models\Status::getStatus('Cancelled')->id && $order->status_id != \App\Models\Status::getStatus('Paid')->id)
                          {!! Form::open(['url' => "orders/$order->id", 'method' => 'PUT']) !!}
                            <input type="hidden" name="status_id" value="{{ \App\Models\Status::getStatus('Cancelled')->id }}">
                            <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                            <button class="btn btn-danger">Cancel</button>
                          {{ Form::close() }}
                          <br>
                        @elseif ($order->status_id == \App\Models\Status::getStatus('Cancelled')->id)
                          {!! Form::open(['url' => "orders/$order->id", 'method' => 'DELETE']) !!}
                            <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                            <button class="btn btn-danger">Delete</button>
                          {{ Form::close() }}
                        @endif
                      @elseif ($salesOrPurchases == "purchase-requests" && $order->status_id == \App\Models\Status::getStatus('Accepted')->id)
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input payment-checkbox" id="customCheck{{ $order->id }}" type="checkbox" name="selectedOrders[]" value="{{ $order->id }}">
                          <label class="custom-control-label" for="customCheck{{ $order->id }}"></label>
                        </div>
                      @elseif ($salesOrPurchases == "sale-requests" && $order->status_id != \App\Models\Status::getStatus('Accepted')->id && $order->status_id != \App\Models\Status::getStatus('Paid')->id)
                        {!! Form::open(['url' => "orders/$order->id", 'method' => 'PUT']) !!}
                          <input type="hidden" name="status_id" value="{{ \App\Models\Status::getStatus('Accepted')->id }}">
                          <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                          <button class="btn btn-success">Accept</button>
                        {{ Form::close() }}
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @if ($salesOrPurchases == "purchase-requests")
              <button type="button" class="btn btn-primary pull-right" onclick="checkSelected()">Pay accepted orders</button>
            @endif
          @else
            No Orders
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->
<script type="text/javascript">
  function checkSelected() {

    checkedOrders = document.querySelectorAll('.payment-checkbox:checked')

    selectedOrders = [];
    for (i = 0; i < checkedOrders.length; i++) {
      selectedOrders.push(checkedOrders[i].value);
    }

    if (selectedOrders.length == 0) {
      alert('Please select at least one order to pay for');
      return false;
    }

    selectedOrders = selectedOrders.toString();

    location.replace('/payments/create?selectedOrders=' + selectedOrders);

  }
</script>
@endsection