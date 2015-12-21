<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li><?= $this->Html->link(__('View'), ['action' => 'view',$software->id ]) ?></li>
        <li class="active"><?= $this->Html->link(__('Edit'), ['action' => 'edit',$software->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <?= $this->Form->create($software) ?>
    <fieldset>
        <legend><?= __('Edit Software') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
