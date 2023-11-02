$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-account-update",
        columns: [
            { "data": "branch" },
            { "data": "card_number" },
            { "data": "old_account" },
            { "data": "new_account" },
            { "data": "new_customer_code" },
            { "data": "customer_name" },
            { "data": "contact_number" },
            { "data": "status" },
            { "data": "isactivate" },
            { "data": "isupdatedetails" },
            { "data": "submitted_by" },
            { "data": "submitted_date" },
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
    let dataurl='submit-account-update/'+id;
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