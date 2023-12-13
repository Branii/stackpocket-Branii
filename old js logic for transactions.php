$(function(){

    $("#query").on("click", function(e){

        e.preventDefault();

        const params = {};
        $('.myInputClass').each(function() { // recieve all the form element val
            const fieldName = $(this).attr('name')
            const fieldVal =  $(this).val()
            params[fieldName] = fieldVal;
        });

        // var currentURL = window.location.href;
        // console.log("Current URL:", currentURL);

        // const params = [$(".username").val(),$(".tradeno").val(),$(".category").val(),$(".startdate").val(),$(".enddate").val()]
        // isEmpty = params.some(field => field === "---")
        // const data = {
        //     params: params
        // }

        console.log(params)

        // const executeQuery = data => {
        //     $.post("../../../execute/transactionfileter",data,(res)=>{
        //         console.log(res)
        //         $(".dataholder").html(res)
        //     })
        // }
        //  executeQuery(data);
    }) 

})