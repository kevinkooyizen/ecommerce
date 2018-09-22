@extends('layouts.app')

@section('content')

<!-- begin::Body -->
<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon m--hide">
                <i class="la la-gear"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Register New Admin
              </h3>
            </div>
          </div>
        </div>

        <!--begin::Form-->
        {!! Form::open(['url' => 'admins', 'method' => 'POST', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
          <div class="m-portlet__body">
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Full Name:</label>
              <div class="col-lg-3">
                <div class="m-input-icon m-input-icon--right">
                  <input type="text" class="form-control m-input" placeholder="Full name" name="name">
                  <span class="m-input-icon__icon m-input-icon__icon--right">
                    <span>
                      <i class="fa fa-user"></i>
                    </span>
                  </span>
                </div>
                <span class="m-form__help">Please enter the user's full name</span>
              </div>
              <label class="col-lg-2 col-form-label">Email:</label>
              <div class="col-lg-3">
                <div class="m-input-icon m-input-icon--right">
                  <input type="text" class="form-control m-input" placeholder="Email" name="email">
                  <span class="m-input-icon__icon m-input-icon__icon--right">
                    <span>
                      <i class="flaticon-mail"></i>
                    </span>
                  </span>
                </div>
                <span class="m-form__help">Please enter the user's email</span>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Password:</label>
              <div class="col-lg-3">
                <div class="m-input-icon m-input-icon--right">
                  <input type="password" class="form-control m-input" placeholder="Password" name="password">
                  <span class="m-input-icon__icon m-input-icon__icon--right">
                    <span>
                      <i class="flaticon-lock-1"></i>
                    </span>
                  </span>
                </div>
                <span class="m-form__help">Please enter the user's password</span>
              </div>
              <label class="col-lg-2 col-form-label">Password:</label>
              <div class="col-lg-3">
                <div class="m-input-icon m-input-icon--right">
                  <input type="password" class="form-control m-input" placeholder="Confirm Password" name="password_confirmation">
                  <span class="m-input-icon__icon m-input-icon__icon--right">
                    <span>
                      <i class="flaticon-lock-1"></i>
                    </span>
                  </span>
                </div>
                <span class="m-form__help">Please confirm the user's password</span>
              </div>
            </div>
          </div>
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </div>
        {{ Form::close() }}

        <!--end::Form-->
      </div>
      <!--end::Portlet-->
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">

      <!--begin::Portlet-->
      <div class="m-portlet">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Admin List
              </h3>
            </div>
          </div>
        </div>
        <div class="m-portlet__body">

          <!--begin::Section-->
          <div class="m-section">
            <div class="m-section__content">
              <table class="table m-table m-table--head-separator-primary">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($admins as $no => $admin)
                    <tr>
                      <th scope="row">{{ $no + 1 }}</th>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>
                        <button type="button" class="btn btn-warning btn-sm" data-user_id="{{ $admin->id }}" data-user_name="{{ $admin->name }}" data-user_email="{{ $admin->email }}" data-toggle="modal" data-target="#editUserModal">
                          Edit
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!--end::Section-->
        </div>
      </div>

      <!--end::Portlet-->

    </div>
  </div>
</div>
<!-- end:: Body -->

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'sales-orders', 'action' => 'SalesOrdersController@store', 'method' => 'POST', 'class' => 'smart-form', 'id' => 'form1', 'data-toggle' => 'validator', 'files' => true]) !!}
          <input type="hidden" name="modal_user_id">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Full Name:</label>
            <input type="text" class="form-control" name="modal_name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Email:</label>
            <input type="email" class="form-control" name="modal_email" required>
          </div>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function updateUser() {
    console.log('yes');
  }

  $(document).ready(function() {
    $('#editUserModal').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var user_id = e.relatedTarget.dataset.user_id;
      var user_name = e.relatedTarget.dataset.user_name;
      var user_email = e.relatedTarget.dataset.user_email;
      $('[name=modal_user_id]').val(user_id);
      $('[name=modal_name]').val(user_name);
      $('[name=modal_email]').val(user_email);
    });
  });
</script>
@endsection