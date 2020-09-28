@extends('layouts.admin')
@section('content_layout')



<!-- Modal ADD NEW -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới vị trí công việc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="myForm" action="{{ route('job.store') }}" onsubmit="return validateForm()" method="POST">
                    @csrf
                    <div class="form-row">
                        <!-- Bắt đầu div form-row !-->
                        <div class="form-group col-md-4">
                            <label for="slbUser">Chọn người dùng</label>
                            <select name="slbUser" id="slbUser" class="form-control" required>
                                <option value="">--Chọn người dùng--</option>
                                @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbDivision">Chọn đơn vị</label>
                            <select name="slbDivision" id="slbDivision" class="form-control" required>
                                <option value="">--Chọn đơn vị--</option>
                                @foreach($division as $division)
                                <option value="{{ $division->id }}">{{ $division->name_division }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbPosition">Chọn chức vụ</label>
                            <select name="slbPosition" id="slbPosition" class="form-control" required>
                                <option value="">--Chọn chức vụ--</option>
                                @foreach($position as $position)
                                <option value="{{ $position->id }}">{{ $position->name_position }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- Kết thúc div form-row !-->
                    <div class="form-row">
                        <!-- Bắt đầu div form-row !-->
                        <div class="form-group col-md-4">
                            <label>Vai trò này chiếm số % công việc:</label>
                            <div>
                                <input data-parsley-type="number" type="text" name="txtPercentageOfRole"
                                    id="txtPercentageOfRole" class="form-control" required placeholder="vd: 65.5" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày bắt đầu nhận vai trò này</label>
                            <input type="date" class="form-control" name="dateStartTime" id="dateStartTime" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày kết thúc vai trò này</label>
                            <input type="date" class="form-control" name="dateEndTime" id="dateEndTime" />
                        </div>
                    </div> <!-- Kết thúc div form-row !-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal ADD NEW -->

<!-- Modal EDIT -->
{{-- <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin vị trí công việc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="myForm" action="{{ route('job.store') }}" onsubmit="return validateForm()" method="POST">
                    @csrf
                    <div class="form-row">
                        <!-- Bắt đầu div form-row !-->
                        <div class="form-group col-md-4">
                            <label for="slbUser">Chọn người dùng</label>
                            <select name="slbUser" id="slbUser_edit" class="form-control" required>
                                <option value="">--Chọn người dùng--</option>
                                @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbDivision">Chọn đơn vị</label>
                            <select name="slbDivision" id="slbDivision_edit" class="form-control" required>
                                <option value="">--Chọn đơn vị--</option>
                                @foreach($division as $division)
                                <option value="{{ $division->id }}">{{ $division->name_division }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbPosition">Chọn chức vụ</label>
                            <select name="slbPosition" id="slbPosition_edit" class="form-control" required>
                                <option value="">--Chọn chức vụ--</option>
                                @foreach($position as $position)
                                <option value="{{ $position->id }}">{{ $position->name_position }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- Kết thúc div form-row !-->
                    <div class="form-row">
                        <!-- Bắt đầu div form-row !-->
                        <div class="form-group col-md-4">
                            <label>Vai trò này chiếm số % công việc:</label>
                            <div>
                                <input data-parsley-type="number" type="text" name="txtPercentageOfRole"
                                    id="txtPercentageOfRole_edit" class="form-control" required
                                    placeholder="vd: 65.5" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày bắt đầu nhận vai trò này</label>
                            <input type="date" class="form-control" name="dateStartTime" id="dateStartTime_edit"
                                required />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày kết thúc vai trò này</label>
                            <input type="date" class="form-control" name="dateEndTime" id="dateEndTime_edit" />
                        </div>
                    </div> <!-- Kết thúc div form-row !-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> --}}
<!-- Modal EDIT -->

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4>
                        <span>Quản lý vị trí công việc</span>
                        <i class="fas fa-caret-down ml-1"></i>
                    </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h5>
                                <span>Bảng danh sách người dùng đã phân vị trí công việc</span>
                                <i class="fas fa-list-alt ml-2"></i>
                            </h5>
                            <p class="text-muted m-b-30"></p>
                            <section class="d-flex justify-content-between">
                                <form role="fullnameAtRoleTop" class="table-search rounded w-25 py-3">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="fullnameAtRoleTop"
                                            name="fullnameAtRole" placeholder="Tìm kiếm...">
                                    </div>
                                </form>
                                {{-- <a href="{{route('role-manage.create')}}" style="margin: 19px;"
                                class="btn btn-primary waves-effect waves-light mx-0"><span>Phân quyền vị trí công
                                    việc</span>
                                <i class="far fa-question-circle ml-1"></i></a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light"
                                    style="height: 50px" data-toggle="modal" data-target="#exampleModal">
                                    Thêm mới vị trí công việc
                                </button>
                            </section>
                            @if (session()->get('create-success'))
                            @include('sweetalert::alert')
                            @endif
                            @if (session()->get('update-success'))
                            @include('sweetalert::alert')
                            @endif
                            @if (session()->get('delete-success'))
                            @include('sweetalert::alert')
                            @endif
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: #35a989" class="shadow-sm text-white">
                                                <th>STT</th>
                                                <th data-priority="1">Tên đăng nhập</th>
                                                <th data-priority="1">Họ và tên</th>
                                                <th data-priority="1">Chức vụ</th>
                                                <th data-priority="1">Đơn vị</th>
                                                <th data-priority="1" style="white-space: nowrap;">Phần trăm</th>
                                                <th data-priority="1">Ngày bắt đầu vai trò</th>
                                                <th data-priority="1">Ngày kết thúc vai trò</th>
                                                <th data-priority="1">Thời gian tạo</th>
                                                <th data-priority="1">Thời gian sửa</th>
                                                <th data-priority="6" colspan="2">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $stt = 0;
                                            @endphp
                                            @foreach($job as $item)
                                            @php
                                            $stt++;
                                            @endphp
                                            <tr>
                                                <td>{{ $stt }}</td>
                                                <td>{{ $item->username}}</td>
                                                <td>{{ $item->fullname}}</td>
                                                <td>{{ $item->name_position}}</td>
                                                <td>{{ $item->name_division}}</td>
                                                <td>{{ $item->percentageOfRole }}%</td>
                                                <td> {{ $item->start_time }}</td>
                                                <td> {{ $item->end_time }}</td>
                                                <td> {{ $item->updated_at }}</td>
                                                <td> {{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{-- <a href="{{ route('role-manage.edit', $item -> id) }}"
                                                        class="btn btn-outline-primary waves-effect waves-light"><i
                                                            class="far fa-edit"></i></a> --}}
                                                        <button class="btn btn-outline-primary waves-effect waves-light far fa-edit editbtn"></button>
                                                        <form action="{{ route('role-manage.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="btn btn-outline-danger waves-effect waves-light ml-2"
                                                                type="submit"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này?')"><i
                                                                    class="far fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>

                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- end page content-->

    </div> <!-- container-fluid -->

</div> <!-- content -->

<script>
    $(document).ready(function(){
        $('.editbtn').on('click', function(){

            $('#editmodal').modal('show');
        });
    });
</script>

@endsection
