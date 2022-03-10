@extends('layouts.master')
@section('title', 'Thêm tài khoản ')
@section('content')
<div class="row center">
  <div class="col-md-6" style="margin: 0 auto;">
    <form  class="form-horizontal" method="post" action="/admin/account/add.html" enctype="multipart/form-data">
        @csrf {{ csrf_field() }}
      <div class="card ">

        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">Thêm tài khoản</h4>
          </div>
        </div>

        <div class="card-body ">

          <div class="row">
            <label class="col-sm-2 col-form-label">STT*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="stt"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Tên đăng nhập*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="us_name"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="password" required="true" name="us_pass"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Nhập lại Mật khẩu</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="password" required="true" name="us_pass2"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="email" email="true" required="true" />
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>email="true"</code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Chức vụ</label>
            <div class="col-sm-7">
              <div class="form-group">
                <select class="selectpicker" data-style="select-with-transition" multiple title="Chọn chức vụ" data-size="7" name="role" name="role">
                  <option value="1">Quản trị</option>
                  <option value="2">Nhân viên</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-primary">Thêm</button>
          <a href="/admin/account/list.html"><button type="button" class="btn btn-rose">Trở lại</button></a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
