<?php  if (!empty($related_items)) : ?>

<div id="related_items">

	<?php if (is_array($related_items)) : ?>

	<?php foreach($related_items as $group => $group_related) : ?>

	<?php 
	if (!is_array($group_related)) : 
	$group_related = array($group_related);
	endif;
	
	$mod = $this->fuel->modules->get($group);
	
	if ($this->fuel->modules->is_advanced($mod))
	{
		$icon = $mod->icon();
		$name = $mod->friendly_name();
		$url = $mod->fuel_url('edit/'.$id);
	}
	else
	{
		$icon = $mod->info('icon_class');
		$name = $mod->info('module_name');
		$url = fuel_url($mod->info('module_uri').'/edit/'.$id);
	}
	
	if (!empty($group_related)) :
	?>
	<h3 class="ico <?=$icon?>"><?=$name?></h3>
	<ul>
		<?php foreach($group_related as $id => $label) : ?>
		<li><a href="<?=$url?>"><?=$label?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	<?php endforeach; ?>
	
	<?php elseif (is_string($related_items)) : ?>
		<?=$related_items?>
	<?php endif; ?>
	
</div>
<?php endif; ?>