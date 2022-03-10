@extends('layouts.master')
@section('title', 'Admin - Home')
@section('title2','Trang Chủ Hệ Thống Chấm Công')
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
              <a href="/admin/checking/add.html">
                <div class="card-icon">
                  <i class="material-icons" style="color:white">loupe</i>
                </div>
              </a>
              <h4 class="card-title ">Danh Sách Chấm Công</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                    <th>
                      Tên Nhân Viên
                    </th>
                    <th>
                      Ngày
                    </th>
                    <th>Nhiệt độ</th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($checking as $ck)
                    <tr>
                      <td>{{$ck->stt}}</td>
                      <td>
                        @foreach($staff as $st)
                          @if ($st->id == $ck->id_staff)
                            {{$st->name}}
                          @endif
                        @endforeach
                      </td>
                      <td>{{\Carbon\Carbon::parse($ck->date_check)->format('d/m/Y')}}</td>
                      <td>{{$ck->temperature}}
                      </td>

                      <td>
                        <button class="btn btn-warning btn-sm"><a href="/admin/checking/edit/{{$ck->id}}.html">Cập nhật</a><div class="ripple-container"></div></button>
                        <button class="btn btn-danger btn-sm"><a href="/admin/checking/delete/{{$ck->id}}.html">Xóa</a><div class="ripple-container"></div></button>
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
