<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li><?= $this->Html->link(__('View'), ['action' => 'view',$user->id ]) ?></li>
        <li class="active"><?= $this->Html->link(__('Edit'), ['action' => 'edit',$user->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('last_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('about');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
