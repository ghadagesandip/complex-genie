<div class="profilePictures index">
	<h2><?php echo __('Profile Pictures'); ?></h2>

    <p id="attAttachments">
        <noscript>
            <span>Please enable JavaScript to use file uploader.</span>
            <!-- or put a simple form for upload here -->
        </noscript>
    </p>

    <ul class="profile_pics">
    <?php foreach ($profilePictures as $profilePicture): ?>
        <li class="profile_pics_items">
            <?php echo $this->Html->image('/files/profile_image/thumb/large/'.$profilePicture['ProfilePicture']['profile_picture']); ?>
            <br/>
            <?php echo $this->Form->postLink(__('X'), array('action' => 'delete', $profilePicture['ProfilePicture']['id']), null, __('Are you sure you want to delete # %s?', $profilePicture['ProfilePicture']['id'])); ?>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Profile Picture'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<style>

</style>