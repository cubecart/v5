{if $RECAPTCHA}
<div class="row">
	<div class="small-12 columns">
		<label>{$LANG.form.verify_human}</label>
		<script type="text/javascript">
			var RecaptchaOptions = {
			   theme : 'clean'
			};
		</script>
		{$DISPLAY_RECAPTCHA}
	</div>
</div>
<hr />
{/if}