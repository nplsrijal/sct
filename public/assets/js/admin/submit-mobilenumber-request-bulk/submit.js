$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-mobilenumber-request-bulk",
        columns: [
            { "data": "bin" },
            { "data": "branch" },
            { "data": "card_number" },
            { "data": "mobile_number" },
            { "data": "customer_name" },
            { "data": "email" },
            { "data": "submitted_by" },
            { "data": "submitted_date" },
            { "data": "status" },
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
    let dataurl='submit-mobilenumber-request-bulk/updatestatus';
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