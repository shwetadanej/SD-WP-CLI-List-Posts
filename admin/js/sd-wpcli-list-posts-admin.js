(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(window).load(function () {

		var sd_wp_cli_admin_scripts = {
			init: function () {
				$(".wp-cli-command-submit").on("click", this.wp_cli_command_submit);
			},

			wp_cli_command_submit: function (e) {
				var formData = $('.frm_wp_cli_command').serialize();
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: formData,
					success: function (response) {
						$(".sd-wp-cli-command-output").html(response.data.message);
					},
					error: function (error) {
						$(".sd-wp-cli-command-output").html('Error submitting the form: ' + error);
					}
				});
			}
		}

		sd_wp_cli_admin_scripts.init();

	});

})(jQuery);
