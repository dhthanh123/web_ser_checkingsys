@extends('layouts.master')
@section('title', 'Danh sách tài khoản ')
@section('title2',' Quản Lý Tài Khoản')
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
              <h4 class="card-title ">Danh Sách Tài Khoản</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                    <th>
                      Tên Đăng Nhập
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Quyền
                    </th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($user as $us)
                    <tr>
                      <td>
                        {{$us->stt}}
                      </td>
                      <td>
                        {{$us->name}}
                      </td>
                      <td>
                        {{$us->email}}
                      </td>
                      <td>
                        @if($us->role == 1)
                        Quản Lý
                        @else
                        Nhân Viên
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><a href="edit/{{$us->id}}.html">Cập nhật</a><div class="ripple-container"></div></button>
                        <button class="btn btn-danger btn-sm"><a href="delete/{{$us->id}}.html">Xóa</a><div class="ripple-container"></div></button>
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
