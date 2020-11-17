$(document).ready(function(){
    $('#ok').click(function(event){
    event.preventDefault();

    var foodItem = $("food_item").val();
    var foodQuantity = $("food_quantity").val();

    alert('Yet to implement')
    return;

    $.ajax({

        url:"api.foodapi.com/order",
        type:"post",
        header:{
            "api-key":"jhbgdtyDSJVJvdhdDnfjkn!^bkh"
        },
        data:{
            "foodItem":foodItem,
            "foodQuantity":foodQuantity
        },
        success:function(data){
            //Do something with the data
        },
        error:function(error){
            alert(error);
        }
    })



    });

});