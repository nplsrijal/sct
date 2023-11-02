$(document).ready(function() {
    getData();
});


function getData()
{
    $('#datatables-reponsive').DataTable({
        processing: true,
        serverSide: true,
        ajax: "submit-account-update-list",
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
