<div class="modal fade" id="phong-modal" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="phong-form" method="post" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin phòng</h5>
                    <span id="idphong" class="fw-bold" style="font-size:1.75rem;"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label for="soluongghe">Số lượng ghế</label>
                        <input type="number" name="soluongghe" id="soluongghe" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="amthanh">Âm thanh</label>
                        <select name="amthanh" id="amthanh" class="form-select ms-2">
                            <option value="Loai S">Loại S</option>
                            <option value="Loai A">Loại A</option>
                            <option value="Loai B">Loại B</option>
                            <option value="Loai C">Loại C</option>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="maychieu">Máy chiếu</label>
                        <select name="maychieu" id="maychieu" class="form-select ms-2">
                            <option value="Loai S">Loại S</option>
                            <option value="Loai A">Loại A</option>
                            <option value="Loai B">Loại B</option>
                            <option value="Loai C">Loại C</option>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="tinhtrang">Tình trạng</label>
                        <select name="tinhtrang" id="tinhtrang" class="form-select ms-2">
                            <option value="tot">Tót</option>
                            <option value="kha">Khá</option>
                            <option value="kem">Kém</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Sửa</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
