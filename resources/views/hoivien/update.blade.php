<div class="modal fade" id="hoivien-modal_update" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="hoivien-form_update" method="post" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin hội viên </h5>
                    <span id="sothe_update" class="fw-bold" style="font-size:1.75rem;"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group my-2">
                        <label for="tenhv_update">Tên hội viên</label>
                        <input type="text" name="tenhv_update" id="tenhv_update" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="ngaysinh_update">Ngày sinh</label>
                        <input type="date" name="ngaysinh_update" id="ngaysinh_update" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diachi_update">Địa chỉ</label>
                        <input type="text" name="diachi_update" id="diachi_update" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="dienthoai_update">Số điện thoại</label>
                        <input type="text" name="dienthoai_update" id="dienthoai_update" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="socccd_update">Số CCCD</label>
                        <input type="text" name="socccd_update" id="socccd_update" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diemtl_update">Điểm tích lũy</label>
                        <input type="number" name="diemtl_update" id="diemtl_update" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="hoivien-btn_update">Sửa</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
