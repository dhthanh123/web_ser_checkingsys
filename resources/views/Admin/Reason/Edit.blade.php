@extends('layouts.master')
@section('title', 'Cập nhật Loại Phép ')
@section('content')
<div class="row center">
  <div class="col-md-6" style="margin: 0 auto;">
    <form  class="form-horizontal" method="post" action="/admin/reason/edit/{{$reason->id}}.html" enctype="multipart/form-data">
        @csrf {{ csrf_field() }}
      <div class="card ">

        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">Cập nhật Phòng Ban</h4>
          </div>
        </div>

        <div class="card-body ">

          <div class="row">
            <label class="col-sm-2 col-form-label">STT*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="stt" value="{{$reason->stt}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Tên Loại Phép*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="name" value="{{$reason->name}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Nhận Lương</label>
            <div class="col-sm-7">
                <select class="selectpicker" data-style="select-with-transition"  title="Nghỉ Phép Lương" data-size="7" name="salary">
                  <option value="1" @if($reason->salary == 1) selected @endif> Có</option>
                  <option value="2" @if($reason->salary != 1) selected @endif> Không</option>
                </select>
            </div>
          </div>

        </div>
        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-warning">Cập nhật</button>
          <a href="/admin/reason/list.html"><button type="button" class="btn btn-rose">Trở lại</button></a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
