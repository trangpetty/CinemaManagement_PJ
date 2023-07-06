<div class="modal fade" id="doanuong-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="doanuong-form" >
                <div class="modal-body">
                    <div class="form-group mb-2" id="iddoanuong-input">
                        <label for="iddoanuong">ID</label>
                        <input type="text" name="iddoanuong" id="iddoanuong" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="ten">Tên</label>
                        <input type="text" name="ten" id="ten" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gia">Giá</label>
                        <input type="number" name="gia" id="gia" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="soluong">Số lượng</label>
                        <input type="number" name="soluong" id="soluong" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="hsd">Hạn sử dụng</label>
                        <input type="date" name="hsd" id="hsd" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="phanloai">Phân loại</label>
                        <select name="phanloai" id="phanloai" class="form-select">
                            <option value="doan">Đồ ăn</option>
                            <option value="douong">Đồ uống</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="bg-brown btn btn-dark" id="doanuong-btn"><span id='doanuong-btn_text'></span></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
