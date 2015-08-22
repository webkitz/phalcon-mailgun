/**
 * Created by Luke Hardiman on 20/08/2015.
 */
$(document).ready(function(){

    /**
     * ViewLists shows all the mailinglists
     */
    $("#viewLists").click(function(){
        $.getJSON('api/getLists',function(response){
                //load into grid
                if (typeof response.data.http_response_body == "object" && response.data.http_response_body.items.length > 0){
                    console.log("response",response.data.http_response_body.items);
                        $('#mailingLists').DataTable( {
                            "data": response.data.http_response_body.items,
                            "columns": [
                                { "data": "name" },
                                { "data": "description" },
                                { "data": "address" },
                                { "data": "members_count" }

                            ]
                        } );

                }
            });

        })

});
