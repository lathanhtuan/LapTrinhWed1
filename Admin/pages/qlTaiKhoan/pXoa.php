<?php if (isset($error)): ?>
 <div class="alert alert-danger" role="alert">
	<?php echo $error; ?>
</div>
<?php elseif(isset($succes)): ?>
<div class ="alert alert-success" role="alert">
	<?php echo $succes; ?>
</div>
<?php endif; ?>