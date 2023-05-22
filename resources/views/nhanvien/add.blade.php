<div class="modal fade" id="nhanvien-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="nhanvien-form_add" data-url="{{ route('nhanvien.store') }}" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Them nhan vien moi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="manv_add">Ma nhanvien</label>
                            <input type="text" name="manv_add" id="manv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="tennv_add">Ten nhan vien</label>
                            <input type="text" name="tennv_add" id="tennv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh_add">Gioi tinh</label>
                            <input type="radio" name="gioitinh_add" value="1"> Nam
                            <input type="radio" name="gioitinh_add" value="0"> Nu
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group my-2">
                            <label for="nbdl_add">Ngay bat dau lam</label>
                            <input type="date" name="nbdl_add" id="nbdl_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="scccdnv_add">So CCCD</label>
                            <input type="text" name="scccdnv_add" id="scccdnv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu_add">Chuc vu</label>
                            <select name="chucvu_add" id="chucvu_add" class="form-select ms-2">
                                <option selected>Chon chuc vu</option>
                                <option value="Thu ngan">Thu ngan</option>
                                <option value="Lao cong">Lao cong</option>
                                <option value="Quan ly">Quan ly</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca_add">Luong ca</label>
                            <select name="luongca_add" id="luongca_add" class="form-select ms-2">
                                <option selected>Chon luong ca</option>
                                <option value="20000">20000</option>
                                <option value="25000">25000</option>
                                <option value="30000">30000</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="thuong_add">Thuong</label>
                            <input type="number" name="thuong_add" id="thuong_add" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="nhanvien-btn_add">Add</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
