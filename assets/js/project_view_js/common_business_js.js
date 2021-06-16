// manage fees in all business products

$("#frais_btn").on("click", function(e) {

    var form = $("#fraisDeDossierForm");

     var serializedFormStr =form.serialize();

    $.ajax({
        type:'POST',
        url:fee_url,
        data: $.trim(serializedFormStr),
        beforeSend: function(){
            $('#fraisDeDossierForm').css("opacity","0.5");
            $('.feeloder').css("display","block");
        },
        success:function(resp){
          
           $(".editjson").val($.trim(resp));
           $('.feeloder').css("display","none");
           $('#fraisDeDossierForm').css("opacity","1");
           if($.trim(resp)=='1'){
                $('.frais_msgdetails').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Record update successfully!</div>').fadeOut(3000);
              setTimeout(function() {
               // location.reload();
              }, 1500);
            }else{
                $('.frais_msgdetails').html('<div class="alert alert-danger fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> '+resp+'</div>');
                setTimeout(function() { 
                    //location.reload();
                }, 3000);
            }
        }

      });

});


  // Change status of checklist document of business product

   $(".checklist_radio").on('change',function(){
     
      var doc_id  =  (this.id).split("_");
      var status_val;
      $(this).closest(".form-group").find(".checklist_loading_status").css("display","inline");
       $('.outputmsg2').html('');
       if($(this).is(":checked"))
       {
         status_val =  "1";
       }
       else{
         status_val =  "0";
       }
     
      $.ajax({
          type:"POST",
          url:document_status__url,
          data:{ document:doc_id[2],status : status_val,type: "checklist" },
          success:function(response){
          if($.trim(response) == "success")
            {
                setTimeout(function(){
                  $(".checklist_loading_status").css("display","none");
                  
                    $('.outputmsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Status Update Successfully</div>');
                },1500);
            }
            else
            {
              setTimeout(function(){
              $(".checklist_loading_status").css("display","none");
               $('.outputmsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Error in updating Status</div>');
             },1500);
            }
           
          }
      });
  });




  // Change status of risk analysis document of business product


  $(".risk_status").on('change',function(){
      var doc_id  =  (this.id).split("_");
      var status_val;
      $(this).closest(".form-group").find(".risk_loading_status").css("display","inline");
       $('.analysismsg2').html('');

      if($(this).is(":checked"))
      {
        status_val =  '1';
      }
      else
      {
        status_val =  '0';
      }
     
      $.ajax({
          type:"POST",
          url:document_status__url,
          data:{ document:doc_id[2],status :status_val,type: "risk_analysis" },
          success:function(response){
           
            if($.trim(response) == "success")
            {
               $(".risk_loading_status").css("display","none");
               $('.analysismsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Status Update Successfully</div>');
              
            }
            else
            {
               $(".risk_loading_status").css("display","none");
               $('.analysismsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Error in updating Status</div>');
            }
           
          }
      });
  });


  // upload system document in business loans

  $(document).on('change', '#systemdocsfiles', function(){
   
    var name = document.getElementById("systemdocsfiles").files[0].name;
    
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) 
    {
      alert("Invalid File type");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("systemdocsfiles").files[0]);
    var f = document.getElementById("systemdocsfiles").files[0];
    var fsize = f.size||f.fileSize;   
    /*if(fsize > 2000000){
      alert("  File Size is very big");
    } */  
    //else
    //{   
      
      for(var i = 0; i < name.length; i++) {        
        form_data.append("files[]", document.getElementById('systemdocsfiles').files[i]);       
      }   

     $.ajax({
        url:system_upload_url,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('.uploaded_image').css("display","inline");
          $('.outputmsg').html('');
        },   
        success:function(response)
        {
        //  console.log(response);
          var obje = JSON.parse(response);
          if(obje.success){             
                $('.uploaded_image').css("display","none");
                $('.outputmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje.success+'.</div>').fadeOut(3000);
                $('.outputmsg').css("display","block");
		setTimeout(function() {
                // location.reload();
              }, 1500);
          }else if(obje.Warning){
            setTimeout(function() {
                $('.uploaded_image').css("display","none");
                $('.outputmsg').html('<div class="alert alert-warning"><i class="fa fa-warning fa-fw fa-lg"></i><strong>Warning!</strong>'+obje.Warning+'.</div>');
              }, 1500);
          }         
          else{
            setTimeout(function() {
                $('.uploaded_image').css("display","none");
                $('.outputmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje.error+'.</div>');
              }, 1500);
          }       
        }
      });
      
    //}
  });


// upload checklist document in business loans

  $(document).on('change', '#check_list_documents', function(){  
    var Fname_1 = document.getElementById("check_list_documents").files[0].name;
    
    var form_data = new FormData();
    var ext = Fname_1.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg','pdf']) == -1) 
    {
      alert("Invalid File type");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("check_list_documents").files[0]);
    var f = document.getElementById("check_list_documents").files[0];
    var fsize = f.size||f.fileSize;   
    /*if(fsize > 2000000){
      alert("  File Size is very big");
    }   
    else
    { */  
   
      for(var i = 0; i < Fname_1.length; i++) {       
        form_data.append("files[]", document.getElementById('check_list_documents').files[i]);        
      }     
      $.ajax({
        url:checklist_upload_url,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('.uploaded_imagechecklist_details').css("display","inline");
          $('.outputmsg2').html('');
        },   
        success:function(response)
        {
          console.log(response);
          var obje1 = JSON.parse(response);
          if(obje1.success){              
            $('.uploaded_imagechecklist_details').css("display","none");
            $('.outputmsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'.</div>').fadeOut(3000);
            $('.outputmsg2').css("display","block");
	 setTimeout(function() {
            // location.reload();
          }, 1500);
        }
          else{
            setTimeout(function() {
                $('.uploaded_imagechecklist').css("display","none");
                $('.outputmsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje+'.</div>');
              }, 1500);
          }       
        }
      });
      
    //}
  });


  // upload risk analysis documents in business loans

  $(document).on('change', '#risk_analysisfiles', function(){    
    
    var namer = document.getElementById("risk_analysisfiles").files[0].name;
    
    var form_data = new FormData();
    var ext = namer.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) 
    {
      alert("Invalid File type");
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("risk_analysisfiles").files[0]);
    var f = document.getElementById("risk_analysisfiles").files[0];
    var fsize = f.size||f.fileSize;   
    /*if(fsize > 2000000){
      alert("  File Size is very big");
    }   
    else*/
    //{
        
      for(var i = 0; i < namer.length; i++) {       
      form_data.append("files[]", document.getElementById('risk_analysisfiles').files[i]);       
      }     
      $.ajax({
        url:risk_upload_url,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('.analysisfilesloder2').css("display","inline");
          $('.outputmsgR2').html('');
        },   
        success:function(response)
        {
          console.log(response);
          $('.outputmsgR2').val($.trim(response));
          $('.analysisfilesloder2').css("display","none");
          var obje1 = JSON.parse(response);
          if(obje1.success){
            $('.analysismsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'.</div>').fadeOut(3000);
            $('.analysismsg2').css("display","block");
		setTimeout(function() {
            //   location.reload();
            }, 1500);
          }
          else{
            setTimeout(function() {           
              $('.analysismsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje1.error+'.</div>');
            }, 1500);
          }
          
                  
        }
      });
      
    //}
  });

// Show Preview Modal to view uploaded docs

    $(".preview").click(function(){
   
      var file_type  =  $(this).attr('file_type');
       if( file_type == "system_docs" )
        {
          $(".lead").text("System Documents");
        }
        else if( file_type == "checklist_docs" )
        {
          $(".lead").text("Check List Documents");
        }
        else if( file_type == "risk_analysis_docs" )
        {
          $(".lead").text("Risk Analysis Documents");
        }


         $.ajax({
             type:"POST",
             url:preview_url,
              cache: false,
              data:{ file_type : file_type },
             success:function(response){
                
                if(response)
                {
                  $(".filePreview").html(response);
                }

             }
        });
    });
    
 

//      // Decision Comment Section 
//     $("#commentsubmit").on("click", function(e) {
        
       
//           if($(".comment_status_c").val() != '' && $("#decision").val() != '')
//             {
//                 var decision  = $("#decision").val();
//                 if(confirm("Voulez-vous poursuivre?")){
//                     var form = $("#DecisionStatusdetails");           
//                     var serializedFormStr =form.serialize();
//                      $.ajax({
//                     type:'POST',
//                     url:decision_url,
//                     data: serializedFormStr,
//                     beforeSend: function(){         
//                         $('#DecisionStatusdetails').css("opacity","0.5"); 
//                         $('.commentlofer').css("display","inline");
//                         $('.commentres').val("");
//                         $('.decisionmsg').html("");
//                     },
//                     success:function(resp){                      
//                         //console.log(resp);
//                         //return false;
//                         alert(decision);
//                         $('#DecisionStatusdetails').css("opacity","");
//                         $('.commentlofer').css("display","none"); 
//                         $('.commentres').val($.trim(resp)); 
//                         $("#DecisionStatusdetails")[0].reset(); 
                        
//                         alert(decision);
//                         var obj=JSON.parse(resp);
//                         if($.trim(obj.success)){
//                           $('.decisionmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obj.success)+'.</div>');
                          
//                           if(decision == "Annuler" || decision == "Abandonner"){
//                               alert("df");
//                               location.reload();
//                           }
//                           else{
//                             //   setTimeout(function() {
//                             //     $(".decision_section").load(window.location.href + " .decision_section");
//                             //     $(".tracking_section").load(window.location.href + " .tracking_section");
//                             //   }, 1000);
//                           }
                         
//                         }
//                       else{                       
//                           $('.decisionmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>'+$.trim(obj.error)+'.</div>');
//                         }               
//                     }                
//                 });
//             }
//             else{
//                 return false;
//             }
//         }
//         else
//         {
//             alert("Please enter Comment");
//         }
    
// });




    // Cad Section 


$('#confirmclick').on("click", function() {
  var eformData = $.trim($('#observation').serialize()); 

  if( $("input[type='checkbox'][name='cadcodesplit']").prop("checked") == false)
  {
      alert("Please Check Autorisation");      
  }
  else if($("#agent_comment").val() == "")
  {
      alert("Please Enter Comment");
  }
  else if( $("input[type='checkbox'][name='cadcodesplit']").prop("checked") == true){     
    if(confirm('Do You Want To Confirm Disbursement?') ) { 
      $.ajax({
        type:'POST',
        url:decision_url,
        data:eformData,
        beforeSend: function(){         
          $('#observation').css("opacity","0.5");
          $('.lodergif').css("display","inline");                  
        },
        success:function(resp){                      
          console.log(resp);
          $('#observation').css("opacity","");
          $('.lodergif').css("display","none");
          $('#confirmclick').html('<i class="fa fa-thumbs-up"></i> <strong> Confirm</strong>');
          $('#confirmclick').attr("disabled", "disabled");
           notificationcall('<span class="icon fa fa-check-circle fa-2x"></span> <p> Disbursement Successfully.</p>','success');                
            setTimeout(function() {                
               location.reload();
            }, 1500);
        }                 
      });
    }
  }
});




  // Head CAD

      $('#button_3').on("click", function() {
        var eformData = $.trim($('#cadform').serialize()); 
      
        if(confirm('Do you want to disburse the loan ?') ) { 
        $.ajax({
            type:'POST',
            url:decision_url,
            data:eformData,
            beforeSend: function(){         
                $('#cadform').css("opacity","0.5"); 
                $('.commentlofer').css("display","inline")
            },
            success:function(resp){                      
              console.log(resp);
              //$('.commentres').val($.trim(resp));      
               $('.commentlofer').css("display","none");
               $('#cadform').css("opacity","1");  
               obj =  JSON.parse(resp);      
                if($.trim(obj.success)){
                  $('.editloanmsg123').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Loan disbursement successfully.</div>');          
                  setTimeout(function() {
                    location.reload();
                  }, 1000);
                }else{
                  $('.editloanmsg123').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>'+$.trim(obj.error)+'.</div>');
                }            
              }        
        });
      }
      
    }); 