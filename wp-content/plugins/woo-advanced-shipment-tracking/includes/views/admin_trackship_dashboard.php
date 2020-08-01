<section id="content_trackship_dashboard" class="inner_tab_section">
	<div class="tab_inner_container">	
		<div class="outer_form_table trackship_status_section">
			<table class="form-table heading-table">
				<tbody>				
					<tr valign="top">
						<td><h3 style=""><?php _e( 'TrackShip status', 'woo-advanced-shipment-tracking' ); ?></h3></td>					
					</tr>
				</tbody>
			</table>	
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" class="titledesc"><label><?php _e( 'Connection Status', 'woo-advanced-shipment-tracking' ); ?></label></th>
						<td class="forminp">
							<fieldset>
								<a href="https://my.trackship.info/?utm_source=wpadmin&utm_medium=sidebar&utm_campaign=upgrade" target="_blank" class="api_connected"><?php _e( 'Connected', 'woo-advanced-shipment-tracking' ); ?><span class="dashicons dashicons-yes"></span></a>
							</fieldset>						
						</td>					
					</tr>
					<tr valign="top">
						<th scope="row" class="titledesc"><label><?php _e( 'Current Plan', 'woo-advanced-shipment-tracking' ); ?></label></th>
						<td class="forminp">
							<fieldset><?php 									
										if(isset($plan_data->subscription_plan)){
											echo $plan_data->subscription_plan;
										}
									?></fieldset>						
						</td>					
					</tr>
					<tr valign="top">
						<th scope="row" class="titledesc"><label><?php _e( 'Trackers Balance', 'woo-advanced-shipment-tracking' ); ?></label></th>
						<td class="forminp">
							<fieldset><?php echo get_option('trackers_balance'); ?></strong></fieldset>						
						</td>					
					</tr>															
					<tr valign="top">										
						<td colspan="2">
							<a href="https://trackship.info/documentation/?utm_source=wpadmin&utm_medium=ts_settings&utm_campaign=docs" class="" style="margin-right: 10px;" target="blank"><?php _e( 'Documentation', 'woo-advanced-shipment-tracking' ); ?></a>
							<a href="https://my.trackship.info/?utm_source=wpadmin&utm_medium=ts_settings&utm_campaign=dashboard" class="" target="blank"><?php _e( 'TrackShip Dashboard', 'woo-advanced-shipment-tracking' ); ?></a>						
						</td>					
					</tr>
				</tbody>
			</table>							
		</div>
		
		<div class="outer_form_table">
			<table class="form-table heading-table">
				<tbody>
					<tr valign="top">
						<td>
							<h3 style=""><?php _e( 'General Settings', 'woo-advanced-shipment-tracking' ); ?></h3>
						</td>					
					</tr>
				</tbody>
			</table>		
			<?php $this->get_html_2( $this->get_trackship_general_data() ); ?>
			<table class="form-table">
				<tbody>
					<tr valign="top">						
						<td class="button-column">
							<div class="submit">								
								<button name="save" class="button-primary woocommerce-save-button btn_ast2 btn_large" type="submit" value="Save changes"><?php _e( 'Save Changes', 'woo-advanced-shipment-tracking' ); ?></button>
								<div class="spinner"></div>								
								<?php wp_nonce_field( 'wc_ast_trackship_form', 'wc_ast_trackship_form' );?>
								<input type="hidden" name="action" value="wc_ast_trackship_form_update">
							</div>	
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php include 'zorem_admin_sidebar.php'; ?>	
</section>