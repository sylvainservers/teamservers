<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('View'), ['action' => 'view',$module->id ]) ?></li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit',$module->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <h3><?= h($module->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Software') ?></th>
            <td><?= $module->has('software') ? $this->Html->link($module->software->title, ['controller' => 'Softwares', 'action' => 'view', $module->software->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($module->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($module->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Create') ?></th>
            <td><?= h($module->create) ?></td>
        </tr>
    </table>
</div>
