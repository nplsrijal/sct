$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "complete-card-activation-list",
        columns: [
            { "data": "bin" },
            { "data": "branch" },
            { "data": "card_number" },
            { "data": "submitted_by" },
            { "data": "submitted_date" },
            { "data": "status" },
            { "data": "action" },
        ],
    });
}
