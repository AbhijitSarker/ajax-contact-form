
function submit_contact_form(){
    var fb = new FormData();
    fd.append('ajaxContactSubmit', 1);
    fd.append('name', $("#your_name").val());
    fd.append('email', $("#your_email").val());
    fd.append('phone', $("#your_phone").val());
    fd.append('comments', $("#your_comments").val());
    js_submit(fd, submit_contact_form_callback);

}

function submit_contact_form_callback(data){

    var jdata = JSON.parse(data);

    if(jdata.success == 1){
        var mess = jdata.message;

        $(".respone_div").html(mess);
        $(".respone_div").css("background-color", "green");
        $(".respone_div").css("color", "$FFFF");
        $(".respone_div").css("padding", "20px");

    }


}

function js_submit(fd,callback){

    var submitUrl = "http//localhost:10003/wpcontent/plugins/ajax-contact_form/process/";

    $.ajax({
        url: submitUrl,
        type: 'post',
        data: fd,
        contentTtype: false,
        processdata: false,
        success: function(response){
            callback(response);
        },
        
    });
}