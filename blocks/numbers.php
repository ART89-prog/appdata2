<?php
$template_url  = get_bloginfo("template_url");

?>
<?php if(is_admin()) { ?>
	<div style="border:10px solid black; text-align: center; font-size:30px;">Блок с цифрами</div>
<?php } else { ?>
<?php 
$blok_s_cziframi = get_field('blok_s_cziframi');
 ?>
<div class="post_items">
	<?php if($blok_s_cziframi): ?>
	<?php foreach ($blok_s_cziframi as $value): ?>		
	<div class="post_item">
		<div class="post_item-title"><?php echo $value["znacheni"]; ?></div>
		<div class="post_item-text"><?php echo $value["podpis"]; ?></div>
	</div>
	<?php endforeach ?>
	<?php endif; ?>
</div>
<?php } ?>


