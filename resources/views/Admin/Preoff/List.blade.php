@extends('layouts.master')
@section('title', 'Danh Sách Xin Phép')
@section('title2',' Quản Lý Phép Nhân Viên')
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
              <a href="/admin/preoff/add.html">
                <div class="card-icon">
                  <i class="material-icons" style="color:white">loupe</i>
                </div>
              </a>
              <h4 class="card-title ">Danh Sách Xin Nghỉ Phép</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                    <th>
                      Tên NV
                    </th>
                    <th>
                      Lý Do
                    </th>
                    <th>
                      Ngày nghỉ
                    </th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($preoff as $pre)
                    <tr>
                      <td>{{$pre->stt}}</td>
                      <td>
                        @foreach($staff as $st)
                          @if ($st->id == $pre->id_staff)
                            {{$st->name}}
                          @endif
                        @endforeach
                        {{$pre->name}}
                      </td>
                      <td>
                        @foreach($reason as $rs)
                          @if($rs->id == $pre->id_reason)
                            {{$rs->name}}
                          @endif
                        @endforeach
                      </td>
                      <td>{{\Carbon\Carbon::parse($pre->date)->format('d/m/Y')}}</td>
                      <td>
                        <button class="btn btn-warning btn-sm"><a href="/admin/preoff/edit/{{$pre->id}}.html">Cập nhật</a><div class="ripple-container"></div></button>
                        <button class="btn btn-danger btn-sm"><a href="/admin/preoff/delete/{{$pre->id}}.html">Xóa</a><div class="ripple-container"></div></button>
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
