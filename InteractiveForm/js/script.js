/*
When the page first loads:
 the first text field is in focus by default,
“Color” drop down menu is hidden until a T-Shirt design is selected,
Credit card option is selected, and the 'bitcoin' and 'paypal' options are hidden.
*/ 

$(document).ready(function() {
    $('#name').focus();
    $('#other-title').hide();
    $('div p ').hide();
    $('#payment option[value="select_method"]').hide();
    $('#payment option[value="credit card"]').attr('selected', '');
    $('#color').hide();
    //$('#color').show('Please select a T-shirt theme');

    //$("#color option").show().html('<option>Please select a T-shirt theme</option>');
    //$("#design ").next().append('<option>Please select a T-shirt theme</option>');

});

/*
Text field that will be revealed
 when the "Other" option is selected from the "Job Role" drop down menu
*/ 

$('#title').on('click', function(event){
   
   if($(this).val()==='other') {
    $('#other-title').show();
    }else{
    $('#other-title').hide();
        }
   
});

/*
For the T-Shirt "Color" menu,
only display the color options that match the design selected in the "Design" menu.
When a new theme is selected from the "Design" menu, the "Color" field and drop down menu is updated.
*/
$('#design').change( function(event){
    if($(this).val()==='js puns'){
        $('#color').show();
        $("#color option[value='steelblue']").hide();
        $("#color option[value='tomato']").hide().removeAttr("selected");
        $("#color option[value='dimgrey']").hide();
        $("#color option[value='cornflowerblue']").show().attr('selected','');
        $("#color option[value='darkslategrey']").show();
        $("#color option[value='gold']").show();
    }  
    else if($(this).val()==='heart js') {
        $('#color').show();
        $("#color option[value='cornflowerblue']").hide().removeAttr("selected");
        $("#color option[value='cornflowerblue']").hide();
        $("#color option[value='darkslategrey']").hide();
        $("#color option[value='gold']").hide();
        $("#color option[value='steelblue']").show();
        $("#color option[value='tomato']").show().attr('selected','');
        $("#color option[value='dimgrey']").show();
    }   
    else {
        $('#color').hide();
    }
   

});

/*
Because some events are at the same day and time as others, if the user selects a workshop, 
selection of a workshop at the same day and time isn't allowed -- I disabled the
 checkbox and visually indicated that the workshop in the competing time slot isn't available.
 When a user unchecks an activity,competing activities (if there are any) are no longer disabled.
 As a user selects activities, a running total is displayed below the list of checkboxes. 
*/

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


/*
The payment displays sections based on the payment option chosen in the select menu.
The "Credit Card" payment option is selected by default. The #credit-card div is displayed,
 and the "PayPal" and "Bitcoin" information are hidden.
 Payment option in the select menu matches the payment option displayed on the page.
*/

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


/*
If any of the following validation errors exist, prevent the user from submitting the form:
Name field can't be blank.
Email field must be a validly formatted e-mail address.
User must select at least one checkbox under the "Register for Activities" section of the form.
If the selected payment option is "Credit Card," make sure the user has supplied a Credit Card number, a Zip Code, and a 3 number CVV value before the form can be submitted.
Credit Card field should only accept a number between 13 and 16 digits.
The Zip Code field should accept a 5-digit number.
The CVV should only accept a number that is exactly 3 digits long.
The field’s borders turn red when there’s a validation error.
*/

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
}

if(
    regexName.test(testName)
&&  regexEmail.test(testEmail)
&&  $('.activities :checked').length>0
&&  creditCard()
)
{
    creditCard();
    alert('Success!');
            //console.log('Submited');
} else {
    $("form").submit(function(e){
        e.preventDefault();
        //console.log('Did not submit');
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
                $('.activities input').css('outline-color', 'red').css('outline-style', 'solid');;
            }
            creditCard();
           
}
    //alert('Did not submit, please fill out the form correctly');
});