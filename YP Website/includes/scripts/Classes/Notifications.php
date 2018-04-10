<?php

class Notification{

	static function save_to_session($style, $message){
		$_SESSION['notify']['style'] = $style;
		$_SESSION['notify']['message'] = $message;
	}

	static function display_notification(){
		$value = 
		'
			<script type="text/javascript">
    			$(window).on("load",function(){
        			$("#notificationModal").modal("show");
    			});
			</script>

			<div id="notificationModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="alert alert-' . $_SESSION['notify']['style'] . ' " role="alert" style="margin-bottom: 1px;">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			        ' . $_SESSION['notify']['message'] . '
			      </div>
			    </div>
			  </div>
			</div>';

		return $value;
	}

	static function delete_from_session(){
		unset($_SESSION['notify']);
	}
}