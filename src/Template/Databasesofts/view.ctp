<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('View'), ['action' => 'view',$databasesoft->id ]) ?></li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit',$databasesoft->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <h3><?= h($databasesoft->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $databasesoft->has('user') ? $this->Html->link($databasesoft->user->id, ['controller' => 'Users', 'action' => 'view', $databasesoft->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($databasesoft->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Host') ?></th>
            <td><?= h($databasesoft->host) ?></td>
        </tr>
        <tr>
            <th><?= __('Ports') ?></th>
            <td><?= h($databasesoft->ports) ?></td>
        </tr>
        <tr>
            <th><?= __('Instance') ?></th>
            <td><?= h($databasesoft->instance) ?></td>
        </tr>
        <tr>
            <th><?= __('Object') ?></th>
            <td><?= h($databasesoft->object) ?></td>
        </tr>
        <tr>
            <th><?= __('Table Space') ?></th>
            <td><?= h($databasesoft->table_space) ?></td>
        </tr>
        <tr>
            <th><?= __('Indexes') ?></th>
            <td><?= h($databasesoft->indexes) ?></td>
        </tr>
        <tr>
            <th><?= __('Tablespaces') ?></th>
            <td><?= h($databasesoft->tablespaces) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($databasesoft->id) ?></td>
        </tr>
    </table>
    
</div>
