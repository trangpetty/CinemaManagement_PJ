<div class="modal fade" id="phim-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="phim-form_add" data-url="{{ route('phim.store') }}" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm phim mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="idphim_add">ID Phim</label>
                            <input type="text" name="idphim_add" id="idphim_add" class="form-control">
                            <p class="text-danger idphim_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="tenphim_add">Tên phim</label>
                            <input type="text" name="tenphim_add" id="tenphim_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="thoiluong_add">Thời lượng</label>
                            <div class="d-flex align-items-center">
                                <input type="number" name="thoiluong_add" id="thoiluong_add" class="form-control w-75">
                                <span> phut</span>

                            </div>
                            <p class="text-danger thoiluong_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="theloai_add">Thể loại</label>
                            <select class="form-select" name="theloai_add" id="theloai_add">
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
                            <label for="daodien_add">Đạo diễn</label>
                            <input type="text" name="daodien_add" id="daodien_add" class="form-control">
                            <p class="text-danger daodien_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="dienvien_add">Diễn viên chính</label>
                            <input type="text" name="dienvien_add" id="dienvien_add" class="form-control">
                            <p class="text-danger dienvien_error"></p>
                        </div>
                        <div class="form-group my-2">
                            <label for="sove_add">Số vé khả dụng</label>
                            <input type="number" name="sove_add" id="sove_add" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="phim-btn_add">Thêm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
