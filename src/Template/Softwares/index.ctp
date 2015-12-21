<nav class="large-3 medium-4 columns">
    <h3><?= __('Softwares') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers index large-10 medium-9 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($softwares as $software): ?>
            <tr>
                <td><?= $this->Number->format($software->id) ?></td>
                <td><?= h($software->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $software->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $software->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $software->id], ['confirm' => __('Are you sure you want to delete # {0}?', $software->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
