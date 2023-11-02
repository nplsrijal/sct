$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-account-update-bulk",
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



$(document).off('click','#submitData',function(){});
$(document).on('click','#submitData',function(e){
    e.preventDefault();
    var id_s = [];
    $("input[name='check_data[]']:checked").each(function ()
    {
        id_s.push($(this).val());
    });
    let postdata={ids:id_s,status:'S'};
    updateStatus(postdata);
   
})

$(document).off('click','#cancelData',function(){});
$(document).on('click','#cancelData',function(e){
    e.preventDefault();
    let currbtn=$(this);
    var id_s = [];
    $("input[name='check_data[]']:checked").each(function ()
    {
        id_s.push($(this).val());
    });
    let postdata={ids:id_s,status:'R'};
    updateStatus(postdata);
   
})


function updateStatus(postdata)
{
    let dataurl='submit-account-update-bulk/updatestatus';
    var request = ajaxRequest(dataurl,postdata,'POST');
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