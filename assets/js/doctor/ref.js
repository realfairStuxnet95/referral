$(function(){
    $("#card_loader").load("referral/step1.php");
    $("#referral_frm").submit(function(e){
        e.preventDefault();
        alert("form submitted");
    });

    $("#btn_step2").click(function(){
       switch_cards($("#card_transfer"),$("#card_finish"));
    });
});
//function to switch form cards
function switch_cards(old,card){
    old.slideUp();
    card.fadeIn();
}
//function to switch between tabs
function switch_tabs(old,tab,icon){
    tab.removeAttr("class");
    tab.attr("class","uk-accordion-title uk-accordion-title-warning");
    old.removeAttr("class");
    old.attr("class","uk-accordion-title uk-accordion-title-success");
    icon.show();

}

//validate string
function validate_string(data){
    var state=false;
    mystring = data;
validRegEx = /^[^\\\/&]*$/
if(mystring.match(validRegEx)){
    state=true;
}else{
    state=false;
}
return state;
}

function check_phone(str){
    var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}
function display_errors(error){
    UIkit.modal.alert(error);
}