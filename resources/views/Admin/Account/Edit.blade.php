@extends('layouts.master')
@section('title', 'Cập nhật tài khoản ')
@section('content')
<div class="row center">
  <div class="col-md-6" style="margin: 0 auto;">
    <form  class="form-horizontal" method="post" action="/admin/account/edit/{{$user->id}}.html" enctype="multipart/form-data">
        @csrf {{ csrf_field() }}
      <div class="card ">

        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">Cập nhật tài khoản</h4>
          </div>
        </div>

        <div class="card-body ">

          <div class="row">
            <label class="col-sm-2 col-form-label">STT*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="stt" value="{{$user->stt}}"/>
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
                <input class="form-control" type="text" required="true" name="us_name" value="{{$user->name}}"/>
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
                <input class="form-control" type="password"  name="us_pass"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code></code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Nhập lại Mật khẩu</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="password" name="us_pass2"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code></code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="email" email="true" required="true" value="{{$user->email}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>email="true"</code>
            </label>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Chức vụ</label>
            <div class="col-sm-7">
                <select class="selectpicker" data-style="select-with-transition" multiple title="Chọn chức vụ" data-size="7" name="role">
                  <option value="1" @if($user->role == 1) selected @endif>Quản trị</option>
                  <option value="2" @if($user->role == 2) selected @endif>Nhân viên</option>
                </select>
            </div>
          </div>
        </div>
        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-warning">Cập nhật</button>
          <a href="/admin/account/list.html"><button type="button" class="btn btn-rose">Trở lại</button></a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
