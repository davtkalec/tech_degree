//https://stackoverflow.com/questions/4331022/focus-input-box-on-load
$(document).ready(function() {
    $('#name').focus();
    $('#other-title').hide();
    $('div p ').hide();
    $('#payment option[value="select_method"]').hide();
    $('#payment option[value="credit card"]').attr('selected', '');
});


$('#title').on('click', function(event){
   
   if($(this).val()==='other') {
    $('#other-title').show();
    }else{
    $('#other-title').hide();
        }
   
});

/*
”T-Shirt Info” section
For the T-Shirt "Color" menu, only display the color options that match the design selected in the "Design" menu.
If the user selects "Theme - JS Puns" then the color menu should only display "Cornflower Blue," "Dark Slate Grey," and "Gold."
If the user selects "Theme - I ♥ JS" then the color menu should only display "Tomato," "Steel Blue," and "Dim Grey."
When a new theme is selected from the "Design" menu, the "Color" field and drop down menu is updated.
*/
$('#design').change( function(event){
    if($(this).val()==='js puns'){
        $("#color option[value='steelblue']").hide();
        $("#color option[value='tomato']").hide().removeAttr("selected");
        $("#color option[value='dimgrey']").hide();
        $("#color option[value='cornflowerblue']").show().attr('selected','');
        $("#color option[value='darkslategrey']").show();
        $("#color option[value='gold']").show();
    }  
    else if($(this).val()==='heart js') {
        $("#color option[value='cornflowerblue']").hide().removeAttr("selected");
        $("#color option[value='cornflowerblue']").hide();
        $("#color option[value='darkslategrey']").hide();
        $("#color option[value='gold']").hide();
        $("#color option[value='steelblue']").show();
        $("#color option[value='tomato']").show().attr('selected','');
        $("#color option[value='dimgrey']").show();
    }   
    
   

});

//let price=0;
let priceDiv = document.createElement('div');

$('.activities').change(function(){

    
    let price=0;

    if ($(' input[name="all"]').prop('checked')){
        
        price +=200;
    }
    
    if($(' input[name="js-frameworks"]').prop('checked')){
        $(' input[name="express"]').attr('disabled',true).parent().css('backgroundColor','gray');
        price +=100;
    } else {
        
        $('input[name="express"]').removeAttr('disabled').parent().css('backgroundColor','initial');
        
    }
    if($(' input[name="express"]').prop('checked')){
        $(' input[name="js-frameworks"]').attr('disabled',true).parent().css('backgroundColor','gray');
        price +=100;
    } else {
        $('input[name="js-frameworks"]').removeAttr('disabled').parent().css('backgroundColor','initial');
       
    }
    if($(' input[name="js-libs"]').prop('checked')){
        $(' input[name="node"]').attr('disabled',true).parent().css('backgroundColor','gray');
        price +=100;
    } else {
        $('input[name="node"]').removeAttr('disabled').parent().css('backgroundColor','initial');
        
    }
    if($(' input[name="node"]').prop('checked')){
        $(' input[name="js-libs"]').attr('disabled',true).parent().css('backgroundColor','gray');
        price +=100;
    } else {
        $('input[name="js-libs"]').removeAttr('disabled').parent().css('backgroundColor','initial');
        
    }

    if ($(' input[name="build-tools"]').prop('checked')){
        
        price +=100;
    }

    if($(' input[name="npm"]').prop('checked')){
        
        price +=100;
    }

    

   priceDiv.innerHTML = ('Total cost is '+ price+  '$');

});

$('.activities ').append(priceDiv);

$('#payment').change(function(){
    switch($('#payment').val()){
        case 'paypal':
        $('.paypal p').show();
        $('#credit-card').hide();
        $('.bitcoin p').hide();
        break;
        
        case 'bitcoin':
        $('.bitcoin p').show();
        $('.paypal p').hide();
        $('#credit-card').hide();
        break;

        case 'credit card':
        $('#credit-card').show();
        $('.bitcoin p').hide();
        $('.paypal p').hide();
    }
});


$('button').on('click',function(){

let testName = $('#name').val();
const regexName = /^\w+$/;

let testEmail = $('#mail').val();
const regexEmail = /^\w+@\w+\.\w+$/;

let testCreditNumber =  $('#cc-num').val();
const regexNumberOfDigits = /^\d{13,16}$/;

let testZipCode = $('#zip').val();
const regexZipCode = /^\d{5}$/;

let testCvv = $('#cvv').val();
const regexCvv = /^\d{3}$/;

let creditCard = function() {
    if (
        regexNumberOfDigits.test(testCreditNumber)
    &&  regexZipCode.test(testZipCode)    
    &&  regexCvv.test(testCvv)
        )
         {
             return true;
        }
        else if ($('#payment').val() !=='credit card') {
            return true;
        }
        else {
            if(regexNumberOfDigits.test(testCreditNumber) === false) {
                $('#cc-num').css('border-color', 'red');
                
            } 
             if(regexZipCode.test(testZipCode)=== false){
                $('#zip').css('border-color', 'red');
            } 
             if (regexCvv.test(testCvv) === false) {
                $('#cvv').css('border-color', 'red');
           }
            
            return false;
        }
};

if(
    regexName.test(testName)
&&  regexEmail.test(testEmail)
&&  $('.activities :checked').length>0
&&  creditCard()
)
{
    
            console.log('Submited');
} else {
    $("form").submit(function(e){
        e.preventDefault();
        console.log('Did not submit');
    });
            if( regexName.test(testName)=== false) {
                $('#name').css('border-color', 'red');
            }
            if( regexEmail.test(testEmail)=== false) {
                $('#mail').css('border-color', 'red');
            }
            if( regexEmail.test(testEmail)=== false) {
                $('#mail').css('border-color', 'red');
            }
             if ($('.activities :checked').length===0) {
                $('.activities label').next().css('border-color', 'red');
            }
}
 
});