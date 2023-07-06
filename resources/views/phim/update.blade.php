<div class="modal fade" id="phim-modal_update" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="phim-form_update" method="post" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin phim <span id="idphim_update" class="fw-bold" style="font-size:1.75rem;"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="tenphim_update">Tên phim</label>
                            <input type="text" name="tenphim_update" id="tenphim_update" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="thoiluong_update">Thời lượng</label>
                            <div class="d-flex align-items-center">
                                <input type="number" name="thoiluong_update" id="thoiluong_update" class="form-control w-75">
                                <span> phut</span>

                            </div>
                            <p class="text-danger thoiluong_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="theloai_update">Thể loại</label>
                            <select class="form-select" name="theloai_update" id="theloai_update">
                                <option selected>Chọn thể loại</option>
                                <option value="Kinh di">Kinh dị</option>
                                <option value="Trinh tham">Trinh thám</option>
                                <option value="Hoat hinh">Hoạt hình</option>
                                <option value="Lang man">Lãng mạn</option>
                                <option value="Vien tuong">Viễn tưởng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group my-2">
                            <label for="daodien_update">Đạo diễn</label>
                            <input type="text" name="daodien_update" id="daodien_update" class="form-control">
                            <p class="text-danger daodien_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="dienvien_update">Diễn viên chính</label>
                            <input type="text" name="dienvien_update" id="dienvien_update" class="form-control">
                            <p class="text-danger dienvien_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="sove_update">Số vé khả dụng</label>
                            <input type="number" name="sove_update" id="sove_update" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="phim-btn_update">Sửa</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
