<!-- Modal EDIT -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin vị trí công việc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" name="myForm" action="{{ route('job.store') }}" onsubmit="return validateForm()" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <!-- Bắt đầu div form-row !-->
                        <div class="form-group col-md-4">
                            <label for="slbUser">Chọn người dùng</label>
                            <select name="slbUser" id="slbUser_edit2" class="form-control" required>
                                <option value="">--Chọn người dùng--</option>
                                @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbDivision">Chọn đơn vị</label>
                            <select name="slbDivision" id="slbDivision_edit2" class="form-control" required>
                                <option value="">--Chọn đơn vị--</option>
                                @foreach($division as $item)
                                <option value="{{ $item->id }}">{{ $item->name_division }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slbPosition">Chọn chức vụ</label>
                            <select name="slbPosition" id="slbPosition_edit2" class="form-control" required>
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
                                    id="txtPercentageOfRole_edit2" class="form-control" required
                                    placeholder="vd: 65.5" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày bắt đầu nhận vai trò này</label>
                            <input type="date" class="form-control" name="dateStartTime" id="dateStartTime_edit2"
                                required />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày kết thúc vai trò này</label>
                            <input type="date" class="form-control" name="dateEndTime" id="dateEndTime_edit2" />
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
<!-- Modal EDIT -->
