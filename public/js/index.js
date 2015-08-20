/**
 * Created by Luke Hardiman on 20/08/2015.
 */
$(document).ready(function(){

    /**
     * ViewLists shows all the mailinglists
     */
    $("#viewLists").click(function(){
        $.getJSON('api/getLists',function(response){
            console.log("response",response);
        })
    })
});
