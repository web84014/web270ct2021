<?php 
$mo_2fa_with_network_security = MoWpnsUtility::get_mo2f_db_option('mo_wpns_2fa_with_network_security', 'get_option');
if ($mo_2fa_with_network_security) {
?>
	<div class="mo_wpns_tab" >
<?php
}
else
{
?>	<div class="nav-tab-wrapper" style="margin-top: -1%;width: 98%;"><?php
}
?>

	<button class="nav-tab" onclick="openTab2fa(this)" id="setup_2fa">Setup Two Factor</button>
	<?php
	if(current_user_can('administrator') )
	{ 
	?>
    	<button class="nav-tab" onclick="openTab2fa(this)" id="unlimittedUser_2fa">Settings</button>
	<?php
	}
		if(current_user_can('administrator'))
		{
			?>
			<?php
			if( !MoWpnsUtility::get_mo2f_db_option('mo2f_is_NC', 'get_option'))
			{
				?>
                <button class="nav-tab" onclick="openTab2fa(this)" id="custom_form_2fa">Registration Forms</button>
				<button class="nav-tab" onclick="openTab2fa(this)" id="login_option_2fa">Login Option</button>
				<?php
			}
			else
			{
					?>
                    <button class="nav-tab" onclick="openTab2fa(this)" id="custom_form_2fa">Registration Forms</button>
                    <button class="nav-tab" onclick="openTab2fa(this)" id="custom_login_2fa">Premium Features</button>
                    <button class="nav-tab" onclick="openTab2fa(this)" id="rba_2fa">AddOns</button>
					<?php
			}
	?>



<?php }

	if($mo_2fa_with_network_security == 0)
	{
		?>
		<!-- <button class="nav-tab"  onclick="openTab2fa(this)" id="upgrade_2fa">Upgrade</button> -->
		<?php
	}
	?>

</div>
<div id="mo_scan_message" style=" padding-top:8px"></div>

        <div class="mo2f_flexbox">
            <div class="mo2f_table_layout" style="padding-right: unset;" id="setup_2fa_div">
                <?php include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'setup_twofa.php'; ?>
            </div>

			<?php
                if(current_user_can('administrator')){?>
            <div class="mo2f_table_layout" id="rba_2fa_div">
                <?php
                if ( get_option( 'mo2f_rba_installed' ) )
                    mo2f_rba_description($mo2f_user_email);
                else
                    include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_rba.php';
                ?>
                <?php
                if ( get_option( 'mo2f_personalization_installed' ) )
                    mo2f_personalization_description($mo2f_user_email);
                else
                    include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_custom_login.php';
                ?>
                <?php
                if ( get_option( 'mo2f_shortcode_installed' ) )
                    mo2f_shortcode_description($mo2f_user_email);
                else
                    include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_shortcode.php';
                ?>
                <?php
                include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_session_control.php';
                ?>
            </div>
            <div class="mo2f_table_layout" id="custom_login_2fa_div">
                <?php
                if ( get_option( 'mo2f_personalization_installed' ) )
                    mo2f_personalization_description($mo2f_user_email);
                else
                    include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_premium_feature.php';
                ?>
            </div>

            <div class="mo2f_table_layout" id="login_option_2fa_div">
                <?php include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_login_option.php'; ?>
            </div>
            <div class="mo2f_table_layout" id="custom_form_2fa_div">
                <?php include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_custom_form.php'; ?>
            </div>


            <div class="mo2f_table_layout" id="unlimittedUser_2fa_div">
                <?php include_once $mo2f_dirName . 'controllers'.DIRECTORY_SEPARATOR.'twofa'.DIRECTORY_SEPARATOR.'two_fa_unlimittedUser.php'; ?>
            </div>

            <div class="mo2f_support_flex">
                <?php include $controller . 'support.php';
                }
                ?>
            </div>
        </div>






<script>
	jQuery("#setup_2fa_div").css("display", "block");

	jQuery("#rba_2fa_div").css("display", "none");
	jQuery("#custom_login_2fa_div").css("display", "none");
	jQuery("#login_option_2fa_div").css("display", "none");
	jQuery("#custom_form_2fa_div").css("display", "none");

	jQuery("#setup_2fa").addClass("nav-tab-active");
	function openTab2fa(elmt){
		var tabname = elmt.id;
		var tabarray = ["setup_2fa","rba_2fa","custom_login_2fa","login_option_2fa", "custom_form_2fa","unlimittedUser_2fa"];
		for (var i = 0; i < tabarray.length; i++) {
			if(tabarray[i] == tabname){
				jQuery("#"+tabarray[i]).addClass("nav-tab-active");
				jQuery("#"+tabarray[i]+"_div").css("display", "block");
			}else{
				jQuery("#"+tabarray[i]).removeClass("nav-tab-active");
				jQuery("#"+tabarray[i]+"_div").css("display", "none");
			}
		}
		localStorage.setItem("last_tab", tabname);
	}
	var tour 	= '<?php echo MoWpnsUtility::get_mo2f_db_option('mo2f_two_factor_tour', 'get_option');?>';

	if(tour != 1)
		var tab = localStorage.getItem("last_tab");
	else
		var tab = '<?php echo get_option("mo2f_tour_tab");?>'; 
	var is_onprem 	= '<?php echo MO2F_IS_ONPREM;?>';
	if(tab == "setup_twofa"){
		document.getElementById("setup_2fa").click();
	}
	else if(tab == "rba_2fa"){
				document.getElementById("rba_2fa").click();
			}
			else if(tab == "custom_login_2fa"){
				document.getElementById("custom_login_2fa").click();
			}
	else if(tab == "login_option_2fa"){
		document.getElementById("login_option_2fa").click();
	}
	else if(tab == "custom_form_2fa"){
		document.getElementById("custom_form_2fa").click();
	}
	else if(tab == "unlimittedUser_2fa")
	{
		if(document.getElementById("unlimittedUser_2fa") !== null){
			document.getElementById("unlimittedUser_2fa").click();	
		}
	}

	else{
		document.getElementById("setup_2fa").click();
	}
</script>