$(".register-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#register").attr("action");
    // var first_name = $("#register").find("input[name='first_name']").val();
    // var last_name = $("#register").find("input[name='last_name']").val();
    // var contact_no = $("#register").find("input[name='contact_no']").val();
    // var email = $("#register").find("input[name='email']").val();
    // var password = $("#register").find("input[name='password']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:$("#register").serialize(),
    }).done(function(data){
        if(data.code == 1){
            toastr.success(data.msg, 'Success Alert', {timeOut: 2000});    
            window.location.href = url + 'auth/';
        }else{
            toastr.error(data.msg, 'Fail Alert', {timeOut: 2000});    
        }
    });
});

$(".login-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#login").attr("action");
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:$("#login").serialize(),
    }).done(function(data){
        if(data.code == 1){
            toastr.success(data.msg, 'Success Alert', {timeOut: 2000});    
            window.location.href = url + "items/";
        }else{
            toastr.error(data.msg, 'Fail Alert', {timeOut: 2000});    
        }
    });
});