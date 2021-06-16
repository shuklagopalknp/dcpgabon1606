 $(function($){


  var inputphone2 = document.querySelector("#phone2"),
  errorMsg = document.querySelector("#phone2error-msg"),
  validMsg = document.querySelector("#phone2valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(inputphone2, {
  hiddenInput: "full_main_number",
  initialCountry: "ga",
  autoPlaceholder :"true",
  utilsScript: base_url+"assets/intl-tel-input-master/build/js/utils.js?1585994360633"
});

var reset = function() {
  inputphone2.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
inputphone2.addEventListener('blur', function() {
  reset();
  if (inputphone2.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    } else {
      inputphone2.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }

  var country_data1 =  $("#phone2").closest("div").find(".iti__selected-flag").attr("aria-activedescendant")
  var country_code1 = country_data1.split("-");
   $("#item_2").val(country_code1['2']);
});

// on keyup / change flag: reset
inputphone2.addEventListener('change', reset);
inputphone2.addEventListener('keyup', reset);


// End Phone no. in details tab



// Start Alternate phone no. in details tab

var inputphone_alt2 = document.querySelector("#phone_alt2"),
  errorMsg_alt2 = document.querySelector("#phone_alt2error-msg"),
  validMsg_alt2 = document.querySelector("#phone_alt2valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap_alt2 = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti_alt2 = window.intlTelInput(inputphone_alt2, {
  hiddenInput: "full_alternate_number",
  initialCountry: "ga",
  utilsScript: base_url+"assets/intl-tel-input-master/build/js/utils.js?1585994360633"
});

var reset = function() {
  inputphone_alt2.classList.remove("error");
  errorMsg_alt2.innerHTML = "";
  errorMsg_alt2.classList.add("hide");
  validMsg_alt2.classList.add("hide");
};

// on blur: validate
inputphone_alt2.addEventListener('blur', function() {
  reset();
  if (inputphone_alt2.value.trim()) {
    if (iti_alt2.isValidNumber()) {
      validMsg_alt2.classList.remove("hide");
    } else {
      inputphone_alt2.classList.add("error");
      var errorCode_alt2 = iti_alt2.getValidationError();
      errorMsg_alt2.innerHTML = errorMap_alt2[errorCode_alt2];
      errorMsg_alt2.classList.remove("hide");
    }
  }

   var country_data2 =  $("#phone_alt2").closest("div").find(".iti__selected-flag").attr("aria-activedescendant")
  var country_code2 = country_data2.split("-");
   $("#item_3").val(country_code2['2']);
});

// on keyup / change flag: reset
inputphone_alt2.addEventListener('change', reset);
inputphone_alt2.addEventListener('keyup', reset);


// Bank phone validate 

var bankinput = document.querySelector("#bank_phone"),
  bankerrorMsg = document.querySelector("#bankphone_error-msg"),
  bankvalidMsg = document.querySelector("#bankphone_valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var bankerrorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti_p = window.intlTelInput(bankinput, {
  hiddenInput: "full_bank_number",
  initialCountry: "ga",
  formatOnDisplay : false,
  utilsScript: base_url+"assets/intl-tel-input-master/build/js/utils.js?1585994360633"
});

var reset = function() {
  bankinput.classList.remove("error");
  bankerrorMsg.innerHTML = "";
  bankerrorMsg.classList.add("hide");
  bankvalidMsg.classList.add("hide");
};

// on blur: validate
bankinput.addEventListener('blur', function() {
  reset();
  if (bankinput.value.trim()) {
    if (iti_p.isValidNumber()) {
      bankvalidMsg.classList.remove("hide");
    } else {
      bankinput.classList.add("error");
      var bnkerrorCode = iti_p.getValidationError();
      bankerrorMsg.innerHTML = bankerrorMap[bnkerrorCode];
      bankerrorMsg.classList.remove("hide");
    }
  }

  var country_data3 =  $("#bank_phone").closest("div").find(".iti__selected-flag").attr("aria-activedescendant")
  var country_code3 = country_data3.split("-");
   $("#item_4").val(country_code3['2']);

});

// on keyup / change flag: reset
bankinput.addEventListener('change', reset);
bankinput.addEventListener('keyup', reset);



 });

 
