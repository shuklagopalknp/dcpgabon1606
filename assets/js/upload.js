$(document).ready(function() {
	var i=$('#table_auto tr').length; // Get the no.of rows in the table
	$(".addmore").on('click',function(){
	html = '<tr id="row_'+i+'">';
	html += '<td style="padding:5px"><input class="case" type="checkbox" style="top: 5px;position: relative;"/></td>';
	html += '<td style="padding:5px">';
	html += '<form action="#">';
	html += '<div class="row">';
	html += '<div class="col-lg-3"><input id="avatar" class="file-loading" type="file" name="image" >';	
     html +='</div><div class="col-lg-4"><div class="progress progress-striped active"><div class="progress-bar" id="progress-bar" style="width:0%"></div></div></div><div class="col-lg-5">';
	html +='<button class="btn btn-sm btn-info upload" type="submit" style="background-color:#2196f3 !important;border:1px #2196f3 !important;margin-right:5px;"><i class="fa fa-upload"></i> Upload</button><button type="button" class="btn btn-sm btn-danger cancel"><i class="fa fa-ban"></i> Cancel</button> <button type="button" class="btn btn-sm btn-primary preview" style="margin-right:5px;"><i class="fa fa-eye"></i> Preview</button><button type="button" class="btn btn-sm btn-primary download" style="margin-right:5px;"><i class="fa fa-cloud-download"></i> Download</button></div>';
	html +='</form>';
	html +='</div>';
    html +='</td>';
	html += '</tr>';
	$('#table_auto').append(html); //Append the new row to the table
	i++;
	
});


//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));	
});

//deletes the selected table rows
$(".delete").on('click', function() {
	var checkedVals = $('.case:checkbox:checked').map(function() {
    return $(this).closest('tr').find('td:nth-child(3)').text();
}).get(); //Get the File name from the third column of the td.
var fileList = checkedVals.join(","); // join all file name by using the seperator ','.
 var co = confirm("Are your sure Delete the file " + fileList + " ?");
        if (co) {
            $.post("delete.php", {
                'file': fileList  //pass data 
            }, function(data) {}, "json");
			
	$('.case:checkbox:checked').parents("tr").remove(); //Renove the table row which is checked for deleted.
	$('#check_all').prop("checked", false); 
        }
	
});


	
	$('.upload-all').click(function(){
			//submit all form
			$('form').submit();
		});

		$('.cancel-all').click(function(){
			//submit all form
			$('form .cancel').click();
		});

		$(document).on('submit','form',function(e){
			e.preventDefault();

			$form = $(this);
	
			uploadImage($form);

		});

		function uploadImage($form){
			$form.find('.progress-bar').removeClass('progress-bar-success')
										.removeClass('progress-bar-danger');
									
 var xhr = new window.XMLHttpRequest();
			$.ajax({
        	url: "server.php",
			type: "POST",
			data: new FormData($form[0]),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(datas)
		    {

alert(datas.data);

			$form.closest('tr').find('td:nth-child(3)').text(datas.image);
			$form.closest('tr').find('td:nth-child(4)').html(datas.destination);
			
		    },
		  	error: function() 
	    	{
	    	},
			  xhr: function () {
               
                //Upload progress
                xhr.upload.addEventListener("progress", function (e) {
                    if (e.lengthComputable) {
                        var percentComplete = (e.loaded || e.position) * 100 / e.total;
                        //Do something with upload progress
                        console.log(percentComplete);
						$form.find('.progress-bar').width(percentComplete+'%').html(percentComplete+'%');
                    }
                }, false);
					xhr.addEventListener('load',function(e){
				$form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....'); 
			});
			                return xhr;
            } 
				        
	   });


			$form.on('click','.cancel',function(){
				xhr.abort();

				$form.find('.progress-bar')
					.addClass('progress-bar-danger')
					.removeClass('progress-bar-success')
					.html('upload aborted...');
			});

		}
	});