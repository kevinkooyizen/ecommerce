@extends('layouts.app')

@section('content')
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-12">
        <div class="checkout_details_area mt-50 clearfix">
          @if (!$categories->isEmpty())
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="20%">Name</th>
                  <th width="80%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr style="max-height: 200px;">
                    <td>{{ $category->name }}</td>
                    <td>
                      <button onclick="location.replace('/categories/{{ $category->id }}/edit')" class="btn btn-warning margin-right-25 pull-left"><i class="fa fa-pencil"></i> Edit Category</button>
                      {!! Form::open(['url' => "categories/$category->id", 'method' => 'PUT']) !!}
                        @if ($category->hide)
                          <button class="btn btn-secondary margin-right-25"><i class="fa fa-eye"></i> Unhide Category</button>
                          <input type="hidden" name="action" value="unhide">
                        @elseif (!$category->hide)
                          <button class="btn btn-secondary margin-right-25"><i class="fa fa-eye-slash"></i> Hide Category</button>
                          <input type="hidden" name="action" value="hide">
                        @endif
                      {{ Form::close() }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            No Categories
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection