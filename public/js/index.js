/**
 * Created by Luke Hardiman on 20/08/2015.
 */

var mailingListsTable = $('#mailingLists').DataTable( {
    "columns": [
        { "data": "name" },
        { "data": "description" },
        { "data": "address" },
        { "data": "members_count" }

    ]
});
var subscriberList = $('#subscribers ul');

$(document).ready(function(){


    /**
     * ViewLists shows all the mailinglists on tab
     */
    $("#viewLists").click(getSubscriptions);

    /**
     * Trigger mailing list render current users
     */
    $('#mailingLists tbody').on('click', 'tr', function () {
        var list = mailingListsTable.row( this ).data();
        console.log("list",list);
        var prams = {
            address : list.address
        }
        //getMembersAction
        $.getJSON('api/getMembers',prams, function(response){
            subscriberList.empty();
            console.log("response",response.data.http_response_body)
            if (response.success == true && typeof response.data.http_response_body == "object" && response.data.http_response_body.items.length > 0) {
                $.each(response.data.http_response_body.items,function(index,subscriber){
                    subscriberList.append('<li>' + subscriber.address + '</li>' )
                })

            }
        })
    } );

    //running on startup
    getSubscriptions();
});

function getSubscriptions(){
    $.getJSON('api/getLists',function(response){
        //load into grid
        if (response.success == true && typeof response.data.http_response_body == "object" && response.data.http_response_body.items.length > 0){
            console.log("response",response);
            //clear and reload
            mailingListsTable.clear().rows.add(response.data.http_response_body.items).draw();
        }
    });
}