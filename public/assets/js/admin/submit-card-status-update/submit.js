$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-card-status-update",
        columns: [
            { "data": "bin" },
            { "data": "card_number" },
            { "data": "request_type" },
            { "data": "submitted_by" },
            { "data": "submitted_date" },
            { "data": "status" },
            { "data": "action" },
        ],
    });
}

$(document).off('click','.approveData',function(){});
$(document).on('click','.approveData',function(e){
    e.preventDefault();
    let currbtn=$(this);
    let id=currbtn.attr('data-pid');
    let postdata={status:'S'};
    updateStatus(id,postdata);
   
})

$(document).off('click','.rejectData',function(){});
$(document).on('click','.rejectData',function(e){
    e.preventDefault();
    let currbtn=$(this);
    let id=currbtn.attr('data-pid');
    let postdata={status:'R'};
    updateStatus(id,postdata);
   
})


function updateStatus(id,postdata)
{
    let dataurl='submit-card-status-update/'+id;
    var request = ajaxRequest(dataurl,postdata,'PUT');
		request.done(function (res) {
			if(res.status ===true)
            {
                 showNotification(res.message,'success');
                 $('#datatables-reponsive').dataTable().fnClearTable();
                 $('#datatables-reponsive').dataTable().fnDestroy();
                 getData();

			}else
            {
                showNotification(res.message,'error')
			}
		});
}