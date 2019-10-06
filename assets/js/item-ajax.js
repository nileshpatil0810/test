var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
manageData();

/* manage data list */
function manageData() {
   $.ajax({
      dataType: 'json',
      url: url + 'get_items',
      data: {page:page}
    }).done(function(data){
       total_page = (data.total / 5);
       console.log(total_page);
       current_page = page;
       if(total_page > 1){
        $('#pagination').twbsPagination({
            totalPages: total_page,
            visiblePages: current_page,
            onPageClick: function (event, pageL) {
                page = pageL;
                if(is_ajax_fire != 0){
                   getPageData();
                }
            }
        });
       }
        manageRow(data.data,data.active_users);
        is_ajax_fire = 1;
   });
}


/* Get Page Data*/
function getPageData() {
    $.ajax({
       dataType: 'json',
       url: + 'get_items',
       data: {page:page}
	}).done(function(data){
       manageRow(data.data);
    });
}

/* Add new Item table row */
function manageRow(data,data1) {
    var	rows = '';
    $.each( data, function( key, value ) {
        rows = rows + '<tr>';
        rows = rows + '<td>'+value.title+'</td>';
        rows = rows + '<td>'+value.description+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });
    $("tbody").html(rows);

    // var rows1 = '';
    // $.each( data1, function( key, value ) {
    //     rows1 = rows1 + '<button type="button" class="btn crud-submit btn-success" id = '+value.id+'>Chat</button>';
    //     rows1 = rows1 + '<br>';
    // });
    // $("#chat_box").html(rows1);


}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var title = $("#create-item").find("input[name='title']").val();
    var description = $("#create-item").find("textarea[name='description']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{title:title, description:description}
    }).done(function(data){
        $(".modal").modal('hide');
        if(data.code == 1){
            toastr.success(data.msg, 'Success Alert', {timeOut: 1000});    
            manageData();
        }else{
            toastr.error(data.msg, 'Fail Alert', {timeOut: 1000});    
        }
    });
});


/* Remove Item */
$("body").on("click",".remove-item",function(e){
    e.preventDefault();
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'delete',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        if(data.code == 1){
            toastr.success(data.msg, 'Success Alert', {timeOut: 1000});    
            manageData();
        }else{
            toastr.error(data.msg, 'Fail Alert', {timeOut: 1000});    
        }

    });
});

/* Edit Item */
$("body").on("click",".edit-item",function(e){
    e.preventDefault();
    var id = $(this).parent("td").data('id');
    var title = $(this).parent("td").prev("td").prev("td").text();
    var description = $(this).parent("td").prev("td").text();
    $("#get_id").val(id);
    $("#edit-item").find("input[name='title']").val(title);
    $("#edit-item").find("textarea[name='description']").val(description);
    //$("#edit-item").find("form").attr("action",url + '/update/' + id);


});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    $(".crud-submit-edit").attr("disabled", true);
    var form_action = $("#edit-item").find("form").attr("action");
    var title = $("#edit-item").find("input[name='title']").val();
    var description = $("#edit-item").find("textarea[name='description']").val();
    var id = $("#get_id").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{title:title, description:description,id:id}
    }).done(function(data){
        $(".crud-submit-edit").attr("disabled", false);
        $(".modal").modal('hide');
        if(data.code == 1){
            toastr.success(data.msg, 'Success Alert', {timeOut: 1000});    
            manageData();
        }else{
            toastr.error(data.msg, 'Fail Alert', {timeOut: 1000});    
        }
    });
});

window.setInterval(function(){
  manageData();
}, 5000);
