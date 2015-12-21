<nav class="large-3 medium-4 columns">
    <h3><?= __('Databases') ?></h3>
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
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('host') ?></th>
                <th><?= $this->Paginator->sort('ports') ?></th>
                <th><?= $this->Paginator->sort('instance') ?></th>
                <th><?= $this->Paginator->sort('object') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($databasesofts as $databasesoft): ?>
            <tr>
                <td><?= $this->Number->format($databasesoft->id) ?></td>
                <td><?= $databasesoft->has('user') ? $this->Html->link($databasesoft->user->username, ['controller' => 'Users', 'action' => 'view', $databasesoft->user->id]) : '' ?></td>
                <td><?= h($databasesoft->title) ?></td>
                <td><?= h($databasesoft->host) ?></td>
                <td><?= h($databasesoft->ports) ?></td>
                <td><?= h($databasesoft->instance) ?></td>
                <td><?= h($databasesoft->object) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $databasesoft->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $databasesoft->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $databasesoft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $databasesoft->id)]) ?>
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
