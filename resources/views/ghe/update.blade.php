<div class="modal fade" id="ghe-modal" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="ghe-form" method="post" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin ghế</h5>
                    <span id="idghe" class="fw-bold" style="font-size:1.75rem;"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label for="loaighe">Loại ghế</label>
                        <select name="loaighe" id="loaighe" class="form-select">
                            <option value="couple">Couple</option>
                            <option value="vip">Vip</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="trangthai">Trạng thái</label>
                        <select name="trangthai" id="trangthai" class="form-select">
                            <option value="tot">Tốt</option>
                            <option value="kha">Khá</option>
                            <option value="kem">Kém</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="ghe-btn">Sửa</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
