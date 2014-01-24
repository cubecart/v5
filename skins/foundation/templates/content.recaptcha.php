{if $RECAPTCHA}
<div class="row">
	<div class="large-12 columns">
		<label>{$LANG.form.verify_human}</label>
		<script type="text/javascript">
			var RecaptchaOptions = {
			   theme : 'clean'
			};
		</script>
		{$DISPLAY_RECAPTCHA}
	</div>
</div>
{/if}