@extends('layouts.master')
@section('title', 'Cập nhật Thông Tin Nhân Viên ')
@section('content')
<div class="row center">
  <div class="col-md-6" style="margin: 0 auto;">
    <form  class="form-horizontal" method="post" action="/admin/staff/edit/{{$staff->id}}.html" enctype="multipart/form-data">
        @csrf {{ csrf_field() }}
      <div class="card ">

        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">Cập nhật Thông Tin Nhân Viên</h4>
          </div>
        </div>

        <div class="card-body ">

          <div class="row">
            <label class="col-sm-2 col-form-label">STT*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="stt" value="{{$staff->stt}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Mã NV*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="code" value="{{$staff->staff_code}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Tên NV*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="name" value="{{$staff->name}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Ngày Sinh*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control datepicker datepicker1"  type="text"  name="birthday" value="{{ \Carbon\Carbon::parse($staff->birthday)->format('d/m/Y')}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Điện Thoại*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" required="true" name="phone" value="{{$staff->phone}}"/>
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Bộ Phận</label>
            <div class="col-sm-7">
                <select class="selectpicker" data-style="select-with-transition" title="Thuộc Bộ Phận" data-size="7" name="id_room">
                  @foreach($room as $r)
                    <option value="{{$r->id}}" @if($r->id == $staff->id_room) selected @endif>{{$r->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>


        </div>
        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-warning">Cập nhật</button>
          <a href="/admin/staff/list.html"><button type="button" class="btn btn-rose">Trở lại</button></a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection
