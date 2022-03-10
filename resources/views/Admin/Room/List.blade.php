@extends('layouts.master')
@section('title', 'Danh sách Phòng Ban')
@section('title2',' Quản Lý Phòng Ban')
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
              <a href="add.html">
                <div class="card-icon">
                  <i class="material-icons" style="color:white">loupe</i>
                </div>
              </a>
              <h4 class="card-title ">Danh Sách Phòng Ban</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                    <th>
                      Tên Phòng
                    </th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($room as $r)
                    <tr>
                      <td>
                        {{$r->stt}}
                      </td>
                      <td>
                        {{$r->name}}
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><a href="/admin/room/edit/{{$r->id}}.html">Cập nhật</a><div class="ripple-container"></div></button>
                        <button class="btn btn-danger btn-sm"><a href="/admin/room/delete/{{$r->id}}.html">Xóa</a><div class="ripple-container"></div></button>
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
