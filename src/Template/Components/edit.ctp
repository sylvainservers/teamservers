<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $component->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $component->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Components'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Databasesofts'), ['controller' => 'Databasesofts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Databasesoft'), ['controller' => 'Databasesofts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="components form large-9 medium-8 columns content">
    <?= $this->Form->create($component) ?>
    <fieldset>
        <legend><?= __('Edit Component') ?></legend>
        <?php
            echo $this->Form->input('server_id', ['options' => $servers]);
            echo $this->Form->input('databasesoft_id', ['options' => $databasesofts]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('create');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
