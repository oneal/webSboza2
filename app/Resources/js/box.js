var boxMobilePhone = $(".box_phone_mobile");
var phoneMobile = $('#phone-mobile');
var active = false;
phoneMobile.on( "click", function(){
    if(active){
        $('.active-phone').css("display","none");
        boxMobilePhone.removeClass("active-phone");
        active = false;
        console.log(active);
    }else{
        boxMobilePhone.addClass("active-phone");
        boxMobilePhone.css("display","block");
        active = true;
    }
})

var boxMobileEmail = $(".box_email_mobile");
var EmailMobile = $('#email-mobile');
var active = false;
EmailMobile.on( "click", function(){
    if(active){
        $('.active-phone').css("display","none");
        boxMobileEmail.removeClass("active-phone");
        active = false;
        console.log(active);
    }else{
        boxMobileEmail.addClass("active-phone");
        boxMobileEmail.css("display","block");
        active = true;
    }
})

var boxMobileDate = $(".box_date_mobile");
var DateMobile = $('#date-mobile');
var active = false;
DateMobile.on( "click", function(){
    if(active){
        $('.active-phone').css("display","none");
        boxMobileDate.removeClass("active-phone");
        active = false;
        console.log(active);
    }else{
        boxMobileDate.addClass("active-phone");
        boxMobileDate.css("display","block");
        active = true;
    }
})