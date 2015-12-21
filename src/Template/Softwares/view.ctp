<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('View'), ['action' => 'view',$software->id ]) ?></li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit',$software->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <h3><?= h($software->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($software->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= $this->Text->autoParagraph(h($software->description)); ?></td>
        </tr>
    </table>
    
    <div class="related">
        <h4><?= __('Related Modules') ?></h4>
        <?php if (!empty($software->modules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Software Id') ?></th>
                <th><?= __('Title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($software->modules as $modules): ?>
            <tr>
                <td><?= h($modules->id) ?></td>
                <td><?= h($modules->software_id) ?></td>
                <td><?= h($modules->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Modules', 'action' => 'view', $modules->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Modules', 'action' => 'edit', $modules->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modules', 'action' => 'delete', $modules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modules->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
