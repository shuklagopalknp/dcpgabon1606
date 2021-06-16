
 // $(function($) {
    
 //    $(".phone_main_c").mask("999-99-99-99");
 //    $(".phone_alternate_c").mask("999-99-99-99");
 //  });

function set_date_end_for_CDD(){
 
     var type_de_cont =  $(".typeofcontract_c").val();

     if(type_de_cont == "")
     {
       $(".edn_date_contract_cdd").val("");
       $(".edn_date_contract_cdd").attr("disabled","disabled");
    //   $(".edn_date_contract_cdd ").removeAttr("required");
      
     }
     else
     {
       $(".edn_date_contract_cdd").removeAttr("disabled");
       $(".edn_date_contract_cdd ").attr("required","true");
     }
     
   }

   $("#nationality_datalist").change(function(){
        var data_val = $('#nationality [value="' + this.value + '"]').data('value');
        $('#nationality_value').val(data_val) ;

   });


 $(function($) {

       

    var today = new Date();

    //alert(today.getDate());
    $('.dob').datepicker({
      changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        maxDate: 0,
        yearRange: "-100:+0",
        changeMonth: true,
        numberOfMonths: 1

    });

     $('#account_open_date').datepicker({
      changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        maxDate: today.getDate(),
        changeMonth: true,
        yearRange: "-100:+10",
        numberOfMonths: 1
    });

    $('.expiration_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        // minDate: 0,
        changeMonth: true,
        numberOfMonths: 1

    });


     $('#room_type').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        maxDate: 0,
        changeMonth: true,
        numberOfMonths: 1

    });

    $('.edn_date_contract_cdd').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        minDate : 0,
        changeMonth: true,
        numberOfMonths: 1,
        // onSelect: function(selected,evnt) {
        //  set_date_end_for_CDD();
        // },

    });
   

    $('.employment_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        maxDate: 0,
        changeMonth: true,
        yearRange: "-100:+50",
        numberOfMonths: 1

    });
  

    $('.current_emp').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        changeMonth: true,
        maxDate:-1,
        yearRange: "-100:+50",
        numberOfMonths: 1

    });
    //$("#current_emp").mask("99-99-9999");
    $('.opening_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy', 
        maxDate:0,
        yearRange: "-100:+50",   
        changeMonth: true,
        numberOfMonths: 1
    });


     $('.stu_dob').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',    
        maxDate: today.getDate(),
        yearRange: "-100:+50",
        changeMonth: true,
        numberOfMonths: 1

    });

    $('#deadline_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        minDate:0,
        yearRange: "-100:+50",
        changeMonth: true,
        numberOfMonths: 1

    });


     $('#subscription_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            yearRange: "-100:+0",
            numberOfMonths: 1

        });


     $('#due_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            minDate:0,
            changeMonth: true,
            yearRange: "-100:+0",
            numberOfMonths: 1

        });

      $('#start_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'

        });


       $('#end_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'

        });


  });

   
   $(".dob").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
var CurrentDate = new Date();
GivenDate = new Date(GivenDate);

if(GivenDate > CurrentDate){
     $(this).val('');
}
else{
  var today = new Date();
   
        var age = today.getFullYear() - dt['2'];
       // alert(age);

        if(age < 18)
        {
          alert("Customer's Age must be above 18 yrs");
          $(this).val('');
        }
}

        
        
    });



   $("account_open_date").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }

});




// $(".expiration_date").on("change",function(){

//         var date_value  =  $(this).val();

//         var dt = date_value.split("-"); 


//         var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
// var CurrentDate = new Date();
// GivenDate = new Date(GivenDate);

// if(GivenDate < CurrentDate){
//      $(this).val('');
// }
// });



$("#room_type").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);
       // alert(GivenDate+"|"+CurrentDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }
});


$(".employment_date").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }
});


$(".opening_date").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }
});


$(".stu_dob").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }
});

// $(".edn_date_contract_cdd").on("change",function(){

//         var date_value  =  $(this).val();

//         var dt = date_value.split("-"); 


//         var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
//         var CurrentDate = new Date();
//         GivenDate = new Date(GivenDate);

//         if(GivenDate < CurrentDate){
//              $(this).val('');
//         }
// });

$(".current_emp").on("change",function(){

        var date_value  =  $(this).val();

        var dt = date_value.split("-"); 


        var GivenDate = dt['2']+"-"+dt['1']+"-"+dt['0'];
        var CurrentDate = new Date();
        GivenDate = new Date(GivenDate);

        if(GivenDate > CurrentDate){
             $(this).val('');
        }
});

 
   $("#nationality_datalist").change(function(){
    var emp_data =  $("#nationality_datalist").val();

     var data_val = $('#nationality [value="' + emp_data + '"]').data('value');
        $('#nationality_value').val(data_val) ;
   });