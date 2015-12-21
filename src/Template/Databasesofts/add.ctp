<nav class="large-3 medium-4 columns">
    <h3><?= __('Add Databases') ?></h3>
    <ul class="side-nav herderbackend">
        <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
        <li class="active"><?= $this->Html->link(__('Add'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <?= $this->Form->create($databasesoft) ?>
    <fieldset>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('title');
            echo $this->Form->input('host');
            echo $this->Form->input('ports');
            echo $this->Form->input('instance');
            echo $this->Form->input('object');
            echo $this->Form->input('table_space');
            echo $this->Form->input('indexes');
            echo $this->Form->input('tablespaces');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
