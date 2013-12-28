<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>

    <script>
        var base_url  = '<?php echo Router::url('/',true);?>';

    </script>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','jquery-ui-1.10.0.custom.min','custom-popup','validationEngine.jquery','fileuploader'));
		echo $this->fetch('meta');
		echo $this->fetch('css');

	?>
</head>
<body>

	<div id="container">
		<div id="header">
			<?php echo $this->element('header');?>	
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			<div id="popup-div">

			</div>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => '', 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
    <?php
        echo $this->Html->script(array('jquery-1.10.1.min','jquery-ui-1.10.0.custom.min','jquery.slimscroll.min','custom-popup','jquery.validationEngine','jquery.validationEngine-en','fileuploader','jquery.dataTables','supportjs'));
        echo $this->fetch('script');
        echo $this->element('ajax_validate');
    ?>
</body>
</html>
