<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('View'), ['action' => 'view',$user->id ]) ?></li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit',$user->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <h3><?= h($user->username) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('About') ?></th>
            <td><?= $this->Text->autoParagraph(h($user->about)); ?></td>
        </tr>
    </table>
    
</div>
