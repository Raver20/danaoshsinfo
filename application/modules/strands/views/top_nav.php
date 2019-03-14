

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Strands <span class="caret"></span></a> 
<ul class="dropdown-menu">
	<?php
		$this->load->module('strands');
		foreach ($strands as $key => $value) {
			$strand_url = $key;
			$strand_name = $value;
	?>
	<li><a href="<?= $strand_url ?>"><?= $strand_name ?></a></li>;
	<?php
		}
	?>
  
</ul>
</li>