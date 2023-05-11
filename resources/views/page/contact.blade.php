@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên hệ với chúng tôi</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
{{-- <div class="beta-map">
    
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>
</div> --}}
<div class="container">
    <div id="content" class="space-top-none">
        
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Mẫu liên hệ</h2>
                <div class="space20">&nbsp;</div>
                <p>Cảm ơn bạn đã liên hệ với chúng tôi! Để đảm bảo hiệu quả, vui lòng để lại thông tin ở bên dưới. <br>
                    Chúng tôi sẽ sớm liên hệ với bạn.</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">	
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Họ và tên (bắt buộc)">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Email (bắt buộc)">
                    </div>
                    <div class="form-block">
                        <input name="your-subject" type="text" placeholder="Thông tin">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Yêu cầu hỗ trợ"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi yêu cầu <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                </br>
                <div class="space20">&nbsp;</div>
                
                <h6 class="contact-title">Địa chỉ</h6>
                </br>
                <p>
                    Khu đô thị Mễ Trì, Mễ Trì Hạ, quận Nam Từ Liêm <br>
                    Thành phố Hà Nội
                </p>
                </br>
                <div>
                    <div class="map-sizing wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.446504973986!2d105.77936307512884!3d21.014812980631046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453366bf9ef75%3A0x6698b35be1c121ff!2sVTI%20Building!5e0!3m2!1svi!2s!4v1682522308560!5m2!1svi!2s"></iframe></div>
                </div>  
                </br>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Ứng tuyển</h6>
                </br>
                <p>
                Chúng tôi luôn tìm kiếm những người tài năng để <br>
                    gia nhập đội ngũ của chúng tôi. <br>
                    <a href="hr@betadesign.com" style="color:cornflowerblue">hr@betadesign.com</a>
                </p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection