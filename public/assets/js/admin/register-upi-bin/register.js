
$(document).off('submit','#dataForm',function(){});
$(document).on('submit','#dataForm',function(e){
    e.preventDefault();
    let dataurl=$('#dataForm').attr('action');
    let postdata=$('#dataForm').serialize();
    var request = ajaxRequest(dataurl,postdata);
		request.done(function (res) {
			if(res.status ===true)
            {
                showNotification(res.message,'success');
                $('#dataForm')[0].reset();

			}else
            {
                showNotification(res.message,'error')
			}
		});
})
