<div class="modal fade" id="suatchieu-modal" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <form id="suatchieu-form" role="form" >
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2" id="idsuatchieu-input">
                        <label for="idsuatchieu">ID suất chiếu</label>
                        <input type="text" name="idsuatchieu" id="idsuatchieu" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="thoigianbd">Thời gian bắt đầu</label>
                        <input type="time" name="thoigianbd" id="thoigianbd" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="idphim">Phim</label>
                        <select name="idphim" id="idphim" class="form-select me-3">
                            @foreach ($phim as $item)
                                <option value="{{ $item->idphim }}">{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="idphong">Phòng</label>
                        <select name="idphong" id="idphong" class="form-select me-3">
                            @foreach ($phong as $item)
                                <option value="{{ $item->idphong }}">{{ $item->idphong }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="loaichieu">Loại suất chiếu</label>
                        <select name="loaichieu" id="loaichieu" class="form-select">
                            <option value="2D">2D</option>
                            <option value="3D">3D</option>
                            <option value="IMax">IMax</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="suatchieu-btn"><span id="suatchieu-btn_text"></span></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
