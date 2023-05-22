<div class="modal fade" id="nhanvien-modal_update" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="nhanvien-form_update" method="post" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cap nhat thong tin nhan vien</h5>
                    <span id="idnv_update" class="fw-bold" style="font-size:1.75rem;"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="tennv_update">Ten nhan vien</label>
                            <input type="text" name="tennv_update" id="tennv_update" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh_update">Gioi tinh</label>
                            <input type="radio" name="gioitinh_update" value="1"> Nam
                            <input type="radio" name="gioitinh_update" value="0"> Nu
                        </div>
                        <div class="form-group my-2">
                            <label for="nbdl_update">Ngay bat dau lam</label>
                            <input type="date" name="nbdl_update" id="nbdl_update" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group my-2">
                            <label for="scccdnv_update">So CCCD</label>
                            <input type="text" name="scccdnv_update" id="scccdnv_update" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu_update">Chuc vu</label>
                            <select name="chucvu_update" id="chucvu_update" class="form-select ms-2">
                                <option selected>Chon chuc vu</option>
                                <option value="Thu ngan">Thu ngan</option>
                                <option value="Boi ban">Boi ban</option>
                                <option value="Pha che">Pha che</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca_update">Luong ca</label>
                            <select name="luongca_update" id="luongca_update" class="form-select ms-2">
                                <option selected>Chon luong ca</option>
                                <option value="20000">20000</option>
                                <option value="25000">25000</option>
                                <option value="30000">30000</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="thuong_update">Thuong</label>
                            <input type="number" name="thuong_update" id="thuong_update" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="nhanvien-btn_update">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
