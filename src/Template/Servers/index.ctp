<nav class="large-3 medium-4 columns">
    <h3><?= __('Server') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers index large-10 medium-9 columns content">
    <h3><?= __('Servers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('hostname') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('Ping status') ?></th>
                <th><?= $this->Paginator->sort('Lost ping') ?></th>
                <th class="actions"><?= __('Show detail') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servers as $server): ?>
            <tr>
                <td><?= $this->Number->format($server->id) ?></td>
                <td><?= h($server->title) ?></td>
                <td><?= h($server->hostname) ?></td>
                <td><?= h($server->country) ?></td>
                <td><?= h($server->status) ?></td>
                <td><?= h($server->ping) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $server->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $server->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?>
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
