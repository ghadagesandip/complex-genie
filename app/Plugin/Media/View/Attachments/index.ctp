<div class="profilePictures index">
	<h2><?php echo __('Profile Pictures'); ?></h2>

    <p id="attAttachments">
        <noscript>
            <span>Please enable JavaScript to use file uploader.</span>
            <!-- or put a simple form for upload here -->
        </noscript>
    </p>

    <ul class="profile_pics">
       <?php foreach ($attachments as $attachment): ?>
            <li class="profile_pics_items">
                <?php  echo $this->Html->image('/files/profile_image/thumb/large/'.$attachment['Attachment']['file_name']); ?>
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
    .profile_pics{}
    .profile_pics_items{
        float: left;
        list-style: none outside none;
        margin: 12px;
    }
    .profile_pics_items img{ border: 1px dotted #B0E0E6; display: inline-block;  height: 152px; width: 167px;}
</style>