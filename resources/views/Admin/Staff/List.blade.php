@extends('layouts.master')
@section('title', 'Danh sách Nhân Viên')
@section('title2',' Quản Lý Nhân Viên')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="container-fluid">

@if(session('alert'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          <b> ><'' - </b>{{session('alert')}}</span>
      </div>

@endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <a href="/admin/staff/add.html">
                <div class="card-icon">
                  <i class="material-icons" style="color:white">loupe</i>
                </div>
              </a>
              <h4 class="card-title ">Danh Sách Nhân Viên</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                    <th>
                      Mã NV
                    </th>
                    <th>
                      Tên NV
                    </th>
                    <th>
                      Ngày Sinh
                    </th>
                    <th>
                      Điện thoại
                    </th>
                    <th>Bộ phận</th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($staff as $st)
                    <tr>
                      <td>{{$st->stt}}</td>
                      <td>{{$st->staff_code}}</td>
                      <td>{{$st->name}}</td>
                      <td>{{\Carbon\Carbon::parse($st->birthday)->format('d/m/Y')}}</td>
                      <td>{{$st->phone}}</td>
                      <td>
                        @foreach($room as $r)
                          @if($st->id_room == $r->id)
                            {{$r->name}}
                          @endif
                        @endforeach</td>
                      <td>
                        <button class="btn btn-warning btn-sm"><a href="/admin/staff/edit/{{$st->id}}.html">Cập nhật</a><div class="ripple-container"></div></button>
                        <button class="btn btn-danger btn-sm"><a href="/admin/staff/delete/{{$st->id}}.html">Xóa</a><div class="ripple-container"></div></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
