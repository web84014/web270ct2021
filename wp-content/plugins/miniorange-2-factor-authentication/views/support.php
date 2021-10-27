<?php
global $mo2f_dirName;

echo '

                <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
       <div class="mo2f_table_layout_support">		
            <img src="'.dirname(plugin_dir_url(__FILE__)).'/includes/images/support3.png">
			<h1>Support</h1>
			<p>Need any help? We are available any time, Just send us a query so we can help you.</p>
				<form name="f" method="post" action="">
					<input type="hidden" name="option" value="mo_wpns_send_query"/>
					<table class="mo_wpns_settings_table">
						<tr><td>
							<input type="email" class="mo_wpns_table_textbox" id="query_email" name="query_email" value="'.$email.'" placeholder="Enter your email" required />
							</td>
						</tr>
						<tr><td>
							<input type="phone" class="mo_wpns_table_textbox" name="query_phone" id="query_phone" value="'.$phone.'" placeholder="Enter your phone"/>
							</td>
						</tr>
						<tr>
							<td>
								<textarea id="query" name="query" class="mo_wpns_settings_textarea" style="resize: vertical;width:100%" cols="52" rows="7" placeholder="Write your query here"></textarea>
							</td>
						</tr>
					</table>
                    <div id="mo_2fa_plugin_configuration">
                    <input type="hidden" name="mo_2fa_plugin_configuration" value="mo2f_send_plugin_configuration"/>
                                <input type="checkbox" id="mo2f_send_configuration"
                                       name="mo2f_send_configuration" 
                                       value="1" checked
                                <h3>Send plugin Configuration</h3>
        <br /><br />
    </div>
					<input type="submit" name="send_query" id="send_query" value="Submit Query" class="button button-primary button-large mo2f_send_query"/>
                    <br>
                    <a href="https://wordpress.org/support/plugin/miniorange-2-factor-authentication/" target="_blank" class="mo2f_raise_support_ticket button button-primary button-large" value="Raise a Support Ticket on WordPress"><i style="margin-left: -8px;" class="fab fa-wordpress"></i> Raise a Support Ticket on WordPress</a>

				</form>		
		</div>';?>
		<script>
			function moSharingSizeValidate(e){
				var t=parseInt(e.value.trim());t>60?e.value=60:10>t&&(e.value=10)
			}
			function moSharingSpaceValidate(e){
				var t=parseInt(e.value.trim());t>50?e.value=50:0>t&&(e.value=0)
			}
			function moLoginSizeValidate(e){
				var t=parseInt(e.value.trim());t>60?e.value=60:20>t&&(e.value=20)
			}
			function moLoginSpaceValidate(e){
				var t=parseInt(e.value.trim());t>60?e.value=60:0>t&&(e.value=0)
			}
			function moLoginWidthValidate(e){
				var t=parseInt(e.value.trim());t>1000?e.value=1000:140>t&&(e.value=140)
			}
			function moLoginHeightValidate(e){
				var t=parseInt(e.value.trim());t>50?e.value=50:35>t&&(e.value=35)
			}
		</script>