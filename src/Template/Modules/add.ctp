<nav class="large-3 medium-4 columns">
    <h3><?= __('Add Module') ?></h3>
    <ul class="side-nav herderbackend">
        <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
        <li class="active"><?= $this->Html->link(__('Add'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <?= $this->Form->create($module) ?>
    <fieldset>
        <?php
            echo $this->Form->input('software_id', ['options' => $softwares]);
            echo $this->Form->input('title');
            echo $this->Form->input('create');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
