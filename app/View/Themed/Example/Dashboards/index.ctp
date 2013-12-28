

<div id="dashboard">
    <ul id="dashnoard-menus">
        <?php foreach($controllers as $idx=>$controller){?>
            <li class="dashoard-menu-items"><?php echo $this->Html->link('Manage '.$controller ,array('controller'=>$controller,'action'=>'index'));?> </li>
        <?php } ?>
    </ul>
</div>

