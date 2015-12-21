<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Component'), ['action' => 'edit', $component->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Component'), ['action' => 'delete', $component->id], ['confirm' => __('Are you sure you want to delete # {0}?', $component->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Components'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Component'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Databasesofts'), ['controller' => 'Databasesofts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Databasesoft'), ['controller' => 'Databasesofts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="components view large-9 medium-8 columns content">
    <h3><?= h($component->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Server') ?></th>
            <td><?= $component->has('server') ? $this->Html->link($component->server->title, ['controller' => 'Servers', 'action' => 'view', $component->server->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Databasesoft') ?></th>
            <td><?= $component->has('databasesoft') ? $this->Html->link($component->databasesoft->title, ['controller' => 'Databasesofts', 'action' => 'view', $component->databasesoft->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $component->has('user') ? $this->Html->link($component->user->id, ['controller' => 'Users', 'action' => 'view', $component->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($component->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Create') ?></th>
            <td><?= h($component->create) ?></td>
        </tr>
    </table>
</div>
