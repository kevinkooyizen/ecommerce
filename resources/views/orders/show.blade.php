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
                      @if ($salesOrPurchases == "purchase-requests" && $order->status_id != \App\Models\Status::getStatus('Accepted')->id)
                        @if ($order->status_id != \App\Models\Status::getStatus('Cancelled')->id && $order->status_id != \App\Models\Status::getStatus('Paid')->id)
                          {!! Form::open(['url' => "orders/$order->id", 'method' => 'PUT']) !!}
                            <input type="hidden" name="status_id" value="{{ \App\Models\Status::getStatus('Cancelled')->id }}">
                            <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                            <button class="btn btn-danger">Cancel</button>
                          <br>
                        @elseif ($order->status_id == \App\Models\Status::getStatus('Cancelled')->id)
                          {!! Form::open(['url' => "orders/$order->id", 'method' => 'DELETE']) !!}
                            <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                            <button class="btn btn-danger">Delete</button>
                        @endif
                      @elseif ($salesOrPurchases == "purchase-requests" && $order->status_id == \App\Models\Status::getStatus('Accepted')->id)
                        {!! Form::open(['url' => "payments/create", 'method' => 'GET']) !!}
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="customCheck{{ $order->id }}" type="checkbox" name="selectedOrders[]" value="{{ $order->id }}">
                            <label class="custom-control-label" for="customCheck{{ $order->id }}"></label>
                          </div>
                      @elseif ($salesOrPurchases == "sale-requests" && $order->status_id != \App\Models\Status::getStatus('Accepted')->id && $order->status_id != \App\Models\Status::getStatus('Paid')->id)
                        {!! Form::open(['url' => "orders/$order->id", 'method' => 'PUT']) !!}
                          <input type="hidden" name="status_id" value="{{ \App\Models\Status::getStatus('Accepted')->id }}">
                          <input type="hidden" name="salesOrPurchases" value="{{ $salesOrPurchases }}">
                          <button class="btn btn-success">Accept</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
              <button class="btn btn-primary pull-right">Pay accepted orders</button>
            {{ Form::close() }}
          @else
            No Orders
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection