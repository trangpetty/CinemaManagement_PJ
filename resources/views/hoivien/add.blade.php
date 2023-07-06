<div class="modal fade" id="hoivien-modal_add" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="hoivien-form_add" data-url="{{ route('hoivien.store') }}" method="POST" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm hội viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label for="sothe_add">Số thẻ</label>
                        <input type="text" name="sothe_add" id="sothe_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="tenhv_add">Tên hội viên</label>
                        <input type="text" name="tenhv_add" id="tenhv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="ngaysinh_add">Ngày sinh</label>
                        <input type="date" name="ngaysinh_add" id="ngaysinh_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diachi_add">Địa chỉ</label>
                        <input type="text" name="diachi_add" id="diachi_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="dienthoai_add">Số điện thoại</label>
                        <input type="text" name="dienthoai_add" id="dienthoai_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="socccd_add">Số CCCD</label>
                        <input type="text" name="socccd_add" id="socccd_add" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="hoivien-btn">Thêm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
