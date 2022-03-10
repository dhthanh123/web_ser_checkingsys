@extends('layouts.master')
@section('title', 'Thêm Danh Sách Phép')
@section('content')
<div class="row center">
  <div class="col-md-6" style="margin: 0 auto;">
    <form  class="form-horizontal" method="post" action="/admin/preoff/add.html" enctype="multipart/form-data">
        @csrf {{ csrf_field() }}
      <div class="card ">

        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">Thêm Danh Sách Phép</h4>
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
            <label class="col-sm-2 col-form-label">Nhân Viên</label>
            <div class="col-sm-7">
                <select class="selectpicker" data-style="select-with-transition"  title="DS Nhân Viên" data-size="7" name="id_staff">
                  @foreach($staff as $sta)
                    <option value="{{$sta->id}}">{{$sta->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Loại Phép</label>
            <div class="col-sm-7">
                <select class="selectpicker" data-style="select-with-transition"  title="Loại Phép" data-size="7" name="id_reason">
                  @foreach($reason as $rs)
                    <option value="{{$rs->id}}">{{$rs->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Ngày Nghỉ*</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input type="text" class="form-control datepicker1" placeholder="dd/mm/yyyy" name="date">
              </div>
            </div>
            <label class="col-sm-3 label-on-right">
              <code>required</code>
            </label>
          </div>
        </div>
        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-primary">Thêm</button>
          <a href="/admin/preoff/list.html"><button type="button" class="btn btn-rose">Trở lại</button></a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')

<script>
    $('#datepicker').datepicker({
        inline: true
    });
</script>
@endsection
