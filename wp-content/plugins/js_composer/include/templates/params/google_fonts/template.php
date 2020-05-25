<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div class="vc_row-fluid vc_column">
	<div class="wpb_element_label"><?php _e( 'Font Family', 'js_composer' ); ?></div>
	<div class="vc_google_fonts_form_field-font_family-container">
		<select class="vc_google_fonts_form_field-font_family-select"
			default[font_style]="<?php echo $values['font_style']; ?>">
			<?php
			/** @var $this Vc_Google_Fonts */
			$fonts = $this->_vc_google_fonts_get_fonts();
			foreach ( $fonts as $font_data ) : ?>
				<option value="<?php echo $font_data->font_family . ':' . $font_data->font_styles; ?>"
					data[font_types]="<?php echo $font_data->font_types; ?>"
					data[font_family]="<?php echo $font_data->font_family; ?>"
					data[font_styles]="<?php echo $font_data->font_styles; ?>"
					class="<?php echo vc_build_safe_css_class( $font_data->font_family ); ?>" <?php echo( strtolower( $values['font_family'] ) == strtolower( $font_data->font_family ) || strtolower( $values['font_family'] ) == strtolower( $font_data->font_family ) . ':' . $font_data->font_styles ? 'selected' : '' ); ?> ><?php echo $font_data->font_family ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<?php if ( isset( $fields['font_family_description'] ) && strlen( $fields['font_family_description'] ) > 0 ) : ?>
		<span class="vc_description clear"><?php echo $fields['font_family_description']; ?></span>
	<?php endif ?>
</div>

<?php if (