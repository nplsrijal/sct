$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-card-status-update-list",
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
