/* quantity */
function plus(a){
    var b = a.getAttribute("data-id");
    var quantity = document.getElementById("input_cart"+b);
    var query = parseInt($('input[name="input_cart'+b+'"]').val());
    if(query < 1){
        query=1;
        document.getElementById("input_cart"+b).setAttribute("value",query);
        document.getElementsByName('input_cart'+b)[0].value = parseInt(query);
        return;
    }
    query = query+1;
    query = query.toFixed(1);
    document.getElementById("input_cart"+b).setAttribute("value",query);
    document.getElementsByName('input_cart'+b)[0].value = parseInt(query);
}
function minus(a){
    var b = a.getAttribute("data-id");
    var quantity = document.getElementById("input_cart"+b);
    var query = parseInt($('input[name="input_cart'+b+'"]').val());
    if(query < 1){
        query=0;
        document.getElementById("input_cart"+b).setAttribute("value",query);
        document.getElementsByName('input_cart'+b)[0].value = parseInt(query);
        return;
    }
    query = query-1;
    query = query.toFixed(1);
    document.getElementById("input_cart"+b).setAttribute("value",query);
    document.getElementsByName('input_cart'+b)[0].value = parseInt(query);
}
function updateInput(a){
    var b = a.getAttribute("id");
    var quantity = document.getElementById(b); 
    var query = parseInt($('input[name="'+b+'"]').val()); 
    if(query < 0){ 
        query=0;
        document.getElementById(b).setAttribute("value",query); 
        document.getElementsByName(b)[0].value = parseInt(query); 
        return; 
    } 
        if(query > 101){ 
        query=100;
        document.getElementById(b).setAttribute("value",query); 
        document.getElementsByName(b)[0].value = parseInt(query); 
        return; 
    } 
    document.getElementById(b).setAttribute("value",parseInt($('input[name="'+b+'"]').val()));
    document.getElementsByName(b)[0].value = parseInt(query);
}

/* delivery */
function updatePrice(b){
    
    var c = b.value;
    var a = document.getElementById("pashka");
    var d = document.getElementById("select").value;
    
    if( c ===  "selfButton"){
        totalPriceDelirevy = totalPrice;
    }else if( c ===  "preButton"){
        totalPriceDelirevy = totalPrice+25;
    }else if( c ===  "hourButton"){
        if(d == 1){
            totalPriceDelirevy = totalPrice + 25;
        }else if(d == 2){
            totalPriceDelirevy = totalPrice + 35;
        }else if(d == 3){
            totalPriceDelirevy = totalPrice + 45;
        }else if(d == 4){
            totalPriceDelirevy = totalPrice + 60;
        }else if(d == 5){
            totalPriceDelirevy = totalPrice + 90;
        }
    }
    a.innerHTML  = 'Общая сумма: ' + totalPriceDelirevy + 'грн.';
}
function updatePriceSelect(){
    
    var a = document.getElementById("pashka");
    var c = $('input[name="radioButton"]:checked').val();
    var d = document.getElementById("select").value;
    
    if( c ===  "selfButton"){
        totalPriceDelirevy = totalPrice;
    }else if( c ===  "preButton"){
        totalPriceDelirevy = totalPrice+25;
    }else if( c ===  "hourButton"){
        if(d == 1){
            totalPriceDelirevy = totalPrice + 25;
        }else if(d == 2){
            totalPriceDelirevy = totalPrice + 35;
        }else if(d == 3){
            totalPriceDelirevy = totalPrice + 45;
        }else if(d == 4){
            totalPriceDelirevy = totalPrice + 60;
        }else if(d == 5){
            totalPriceDelirevy = totalPrice + 90;
        }
    }
    
    
    a.innerHTML  = 'Общая сумма: ' + totalPriceDelirevy + 'грн.';
}
/* main */
$(document).ready(function () {
    /* Edited footer */
    if(((($("#footer").offset().top+$("#footer").height())<=($(window).scrollTop()+$(window).height()))&&(($("#footer").offset().top)>=($(window).scrollTop())))){
        $("#footer").css("position","absolute");
        $("#footer").css("bottom","0");
        $("#footer").css("width","100%");
    }
    /* */
    	
    $(".search_best").click(function () {
        var newdata = $(this).text();
        document.getElementsByName('q')[0].value = newdata;
        $("#h-search").submit();
    });
    /* add to cart */
    $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id"),quantity = $('input[name="input_cart_'+id+'"]').val();
            $.post("/cart/addAjax/"+id+"/"+quantity, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });

	$("input[name='radioButton']").click();
});
