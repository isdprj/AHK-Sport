@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input type="text" name="name" value="{{ $product->name}}" class="form-control"  placeholder="Nhập tên sản phẩm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="id_category">
                            @foreach($productCategory as $pc)
                                <option value="{{ $pc->id }}">{{ $pc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="unit_price" value="{{ $product->unit_price}}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="promotion_price" value="{{ $product->promotion_price}}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $product->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Thông số</label>
                <textarea name="stats" id="stats" class="form-control">{{ $product->stats}}</textarea>
            </div>

            <div class="form-group">
                <label>Đơn vị</label>
                <input type="text" name="unit" value="{{$product->unit}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Số lượng</label>
                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Ảnh</label>
                <input type="text" name="image" value="{{$product->image}}" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        window.onload = function() {
            CKEDITOR.replace( 'stats' );
    };
    </script>
@endsection