$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id, url){
    if (confirm('Ban co chac muon xoa khong?')){
        $.ajax({
            type: 'DELETE',
            dataType : 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if (result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xoa khong thanh cong')
                }

            }
        });
        $('a[href="#"]').attr('href', url);
    }
}

function changeRole(id , url){
    if (confirm('Ban co chac muon thay doi vai tro khong')){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url : url,
            data : {id : id},
            success: function(response) {
              // Determine the new value for the is_admin column
              var currentValue = response.is_admin;
              var newValue = currentValue ? 0 : 1;  
            $.ajax({
                type: 'PUT',
                dataType : 'JSON',
                url: url,
                data: {is_admin: newValue },
                success: function(result){
                    if (result.error === false){
                        alert(result.message);
                        location.reload();
                    }else{
                        alert('Xoa khong thanh cong')
                        }
                    }
                });
            },
        });
        $('a[href="#"]').attr('href', url);
    }
}

function show1(){
    document.getElementById('payment_method_bacs').style.display = 'block';
    document.getElementById('payment_method_vnpay').style.display = 'none';
    document.getElementById('payment_method_ib').style.display = 'none';
    document.getElementById('payment_method_zalopay').style.display = 'none';
    document.getElementById('payment_method_momo').style.display = 'none';


}

function show2(){
    document.getElementById('payment_method_bacs').style.display = 'none';
    document.getElementById('payment_method_vnpay').style.display = 'block';
    document.getElementById('payment_method_ib').style.display = 'none';
    document.getElementById('payment_method_zalopay').style.display = 'none';
    document.getElementById('payment_method_momo').style.display = 'none';
}

function show3(){
    document.getElementById('payment_method_bacs').style.display = 'none';
    document.getElementById('payment_method_vnpay').style.display = 'none';
    document.getElementById('payment_method_ib').style.display = 'block';
    document.getElementById('payment_method_zalopay').style.display = 'none';
    document.getElementById('payment_method_momo').style.display = 'none';
}

function show4(){
    document.getElementById('payment_method_bacs').style.display = 'none';
    document.getElementById('payment_method_vnpay').style.display = 'none';
    document.getElementById('payment_method_ib').style.display = 'none';
    document.getElementById('payment_method_zalopay').style.display = 'block';
    document.getElementById('payment_method_momo').style.display = 'none';
}

function show5(){
    document.getElementById('payment_method_bacs').style.display = 'none';
    document.getElementById('payment_method_vnpay').style.display = 'none';
    document.getElementById('payment_method_ib').style.display = 'none';
    document.getElementById('payment_method_zalopay').style.display = 'none';
    document.getElementById('payment_method_momo').style.display = 'block';
}