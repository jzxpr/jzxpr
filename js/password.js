/**
 * jzxpr
 * Password
 *
 * @author      BizLogic <hire@bizlogicdev.com>
 * @copyright   2015 BizLogic
 * @link        http://bizlogicdev.com
 * @link		http://jzxpr.com
 * @license     GNU Affero General Public License v3
 *
 * @since  	    Friday, May 08, 2015, 15:33 GMT+1
 * @modified    $Date$ $Author$
 * @version     $Id$
 *
 * @category    JavaScript
 * @package     jzxpr
*/

$(document).ready(function() {	

	$('#btnPasswordAdd').live('click', function(event) {
		event.preventDefault();
		$.blockUI();
		
		var valid = formIsValid( 'frmPasswordAdd' );
		if( valid ) {
			
			var formData = $('#frmPasswordAdd').formParams();
			
			$.ajax({
				type: 'POST',
				url: BASEURL + '/password/ajax',
				data: { 
					method: 'passwordAdd',
					data: formData
				},
				complete: function( jqXHR, textStatus ) {
					// ...
				},
				success: function( response, textStatus, jqXHRresponse ) {
					if( response.status == 'OK' ) {
						// clear the form values
						$('form input').val('');
						$('form select').val('');
						
						$.unblockUI();
					} else {
						$.unblockUI();
					}
				},
				error: function( jqXHR, textStatus, errorThrown ) {
					$.unblockUI();
				},		
				dataType: 'json'
			});				
		} else {
			$.unblockUI();
			return false;
		}

	});
	
	$('.password-show').live('click', function(event) {
		event.preventDefault();
		
		var id = $(this).data('id');
		
		bootbox.alert( id, function() {
			// ...
		});
		
		$.ajax({
			type: 'POST',
			url: BASEURL + '/password/ajax',
			data: { 
				method: 'passwordDecrypt',
				id: id 
			},
			complete: function( jqXHR, textStatus ) {
				// ...
			},
			success: function( response, textStatus, jqXHRresponse ) {
				if( response.status == 'OK' ) {
					$.unblockUI();
				} else {
					$.unblockUI();
				}
			},
			error: function( jqXHR, textStatus, errorThrown ) {
				$.unblockUI();
			},		
			dataType: 'json'
		});			
		
		return false;
	});

});