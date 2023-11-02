$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-mobilenumber-list",
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
