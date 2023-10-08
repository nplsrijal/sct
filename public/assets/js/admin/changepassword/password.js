$(document).off('submit','#dataForm',function(){});
$(document).on('submit','#dataForm',function(e){
    e.preventDefault();
    let dataurl='user/submitnewpassword';
    let token=$("input[name='_token']").val();
    let password=$('#password').val();
    let repassword=$('#repassword').val();
    var request = ajaxRequest(dataurl,{password,repassword,_token:token},'POST');
		request.done(function (res) {
	    if(res.status ===true)
        {

            showNotification(res.message,'success')
        }
        else
        {
            showNotification(res.message,'error')
        }
		});
})