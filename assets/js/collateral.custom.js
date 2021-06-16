(function() {	
	var bttnFlip = document.getElementById('notification_preview');			
		//bttnFlip.disabled = false;
		bttnFlip.addEventListener( 'click', function() {
		classie.add( bttnFlip, 'active' );
		classie.remove( bttnFlip, 'active' );				
		var notification = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload System Docs files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in windows</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnFlip.disabled = false;
			}			
		});				
		notification.show();				
		this.disabled = true;
	});
			
	var bttnBouncyflip = document.getElementById('notification_download');			
		bttnBouncyflip.disabled = false;
		bttnBouncyflip.addEventListener( 'click', function() {
			classie.add( bttnBouncyflip, 'active' );
			classie.remove( bttnBouncyflip, 'active' );				
			var notification = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Error!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyflip.disabled = false;
				}
			});				
			notification.show();				
			this.disabled = true;
	});
	
	var bttnFlip2 = document.getElementById('notification_CheckList_preview');			
	bttnFlip2.disabled = false;
	bttnFlip2.addEventListener( 'click', function() {
		classie.add( bttnFlip2, 'active' );
		classie.remove( bttnFlip2, 'active' );				
		var notification2 = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload Check List Customer Documents files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnFlip2.disabled = false;
			}
		});				
		notification2.show();				
		this.disabled = true;
	});
	
	var bttnBouncyflip2 = document.getElementById('notification_CheckList_download');			
		bttnBouncyflip2.disabled = false;
		bttnBouncyflip2.addEventListener( 'click', function() {
			classie.add( bttnBouncyflip2, 'active' );
			classie.remove( bttnBouncyflip2, 'active' );				
			var notification3 = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Notice!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyflip2.disabled = false;
				}
			});				
			notification3.show();				
			this.disabled = true;
	});
	
	/* Notification System Docs Details */
		var bttnNFlip = document.getElementById('notification_preview2');			
		//bttnFlip.disabled = false;
		bttnNFlip.addEventListener( 'click', function() {
		classie.add( bttnNFlip, 'active' );
		classie.remove( bttnNFlip, 'active' );				
		var notificationN = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload System Docs files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in windows</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnNFlip.disabled = false;
			}			
		});				
		notificationN.show();				
		this.disabled = true;
	});
	
	var bttnBouncyNflip = document.getElementById('notification_download2');			
		bttnBouncyNflip.disabled = false;
		bttnBouncyNflip.addEventListener( 'click', function() {
			classie.add( bttnBouncyNflip, 'active' );
			classie.remove( bttnBouncyNflip, 'active' );				
			var notificationN2 = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Error!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyNflip.disabled = false;
				}
			});				
			notificationN2.show();				
			this.disabled = true;
	});
	
	/* Notification Check List Customer Documents Details */
	var bttnNFlip2 = document.getElementById('notification_CheckList_preview2');			
	bttnNFlip2.disabled = false;
	bttnNFlip2.addEventListener( 'click', function() {
		classie.add( bttnNFlip2, 'active' );
		classie.remove( bttnNFlip2, 'active' );				
		var notificationCn2 = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload Check List Customer Documents files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnNFlip2.disabled = false;
			}
		});				
		notificationCn2.show();				
		this.disabled = true;
	});
	
	var bttnBouncyflipD2 = document.getElementById('notification_CheckList_download2');			
		bttnBouncyflipD2.disabled = false;
		bttnBouncyflipD2.addEventListener( 'click', function() {
			classie.add( bttnBouncyflipD2, 'active' );
			classie.remove( bttnBouncyflipD2, 'active' );				
			var notificationD3 = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Notice!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyflipD2.disabled = false;
				}
			});				
			notificationD3.show();				
			this.disabled = true;
	});
	
	
	
	
	/* Risk Analysis split ============================================*/	
	var bttnFlipAnalysis = document.getElementById('notification_Analysispreview');		
		bttnFlipAnalysis.addEventListener( 'click', function() {
		classie.add( bttnFlipAnalysis, 'active' );
		classie.remove( bttnFlipAnalysis, 'active' );				
		var notification = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload Risk Analysis files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in windows</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnFlipAnalysis.disabled = false;
			}
		});				
		notification.show();				
		this.disabled = true;
	});
	
	/* Download Analysis split ====================================*/
		var bttnBouncyflip = document.getElementById('notification_analysis_download');			
		bttnBouncyflip.disabled = false;
		bttnBouncyflip.addEventListener( 'click', function() {
			classie.add( bttnBouncyflip, 'active' );
			classie.remove( bttnBouncyflip, 'active' );				
			var notification = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Notice!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyflip.disabled = false;
				}
			});				
			notification.show();				
			this.disabled = true;
	});
	
	
	
	
	/* Risk Analysis Details ============================================*/	
	var bttnFlipAnalysis = document.getElementById('notification_Analysispreview2');		
		bttnFlipAnalysis.addEventListener( 'click', function() {
		classie.add( bttnFlipAnalysis, 'active' );
		classie.remove( bttnFlipAnalysis, 'active' );				
		var notification = new NotificationFx({
			message : '<p><i class="fa fa-info-circle fa-fw fa-lg"></i> Notice!</strong> Please first upload Risk Analysis files.Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in windows</p>',
			layout : 'attached',
			effect : 'flip',
			type : 'notice', // notice, warning or error
			onClose : function() {
				bttnFlipAnalysis.disabled = false;
			}
		});				
		notification.show();				
		this.disabled = true;
	});
	
	/* Download Analysis Details ====================================*/
		var bttnBouncyflip = document.getElementById('notification_analysis_download2');			
		bttnBouncyflip.disabled = false;
		bttnBouncyflip.addEventListener( 'click', function() {
			classie.add( bttnBouncyflip, 'active' );
			classie.remove( bttnBouncyflip, 'active' );				
			var notification = new NotificationFx({
				message : '<span class="fa fa-times-circle fa-3x pull-left"></span><p><strong> Notice!</strong> System Cannot Find the File Specified. Thumbnail preview, does not work for jpg files uploaded bye the onedrive sync in System</p>',
				layout : 'attached',
				effect : 'bouncyflip',
				type : 'error', // notice, warning or error
				onClose : function() {
					bttnBouncyflip.disabled = false;
				}
			});				
			notification.show();				
			this.disabled = true;
	});
	
	
	
})();