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
} );

$(document).ready(function(){


    /**
     * ViewLists shows all the mailinglists on tab
     */
    $("#viewLists").click(getSubscriptions);

    /**
     * Trigger mailing list render current users
     */
    $('#mailingLists tbody').on('click', 'tr', function () {
        var data = mailingListsTable.row( this ).data();
        console.log("data",data);
    } );

    //running on startup
    getSubscriptions();
});

function getSubscriptions(){
    $.getJSON('api/getLists',function(response){
        //load into grid
        if (typeof response.data.http_response_body == "object" && response.data.http_response_body.items.length > 0){
            console.log("response",response);
            //clear and reload
            mailingListsTable.clear().rows.add(response.data.http_response_body.items).draw();
        }
    });
}