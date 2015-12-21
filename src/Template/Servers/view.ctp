<nav class="large-3 medium-4 columns">
    <h3><?= __('Show detail') ?></h3>
    <ul class="side-nav herderbackend">
        <li class="active"><?= $this->Html->link(__('View'), ['action' => 'view',$server->id ]) ?></li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit',$server->id]) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th><?= __('Server name: ') ?></th>
            <td><?= h($server->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Ip: ') ?></th>
            <td><?= h($server->ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Hostname: ') ?></th>
            <td><?= h($server->hostname) ?></td>
        </tr>
        <tr>
            <th><?= __('Country: ') ?></th>
            <td><?= h($server->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Project name: ') ?></th>
            <td><?= h($server->project) ?></td>
        </tr>
        <tr>
            <th><?= __('Ping status: ') ?></th>
            <td><?= h($server->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Cpu: ') ?></th>
            <td><?= h($server->cpu) ?></td>
        </tr>
        <tr>
            <th><?= __('Memory: ') ?></th>
            <td><?= $this->Number->format($server->memory) ?></td>
        </tr>
        <tr>
            <th><?= __('Disk Capacity: ') ?></th>
            <td><?= $this->Number->format($server->disk_capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Create: ') ?></th>
            <td><?= h($server->create) ?></td>
        </tr>
    </table>
    <div class="related">
        <ul class="side-nav herderbackend">
            <li class="active"><?= $this->Html->link(__('List Components'), ['action' => 'view',$server->id]) ?></li>
            <li><?= $this->Html->link(__('Add new'), ['action' => 'edit',$server->id]) ?></li>
        </ul>
        <?php if (!empty($server->components)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($server->components as $components): ?>
            <tr>
                <td><?= h($components->type) ?></td>
                <td>
                <?php
                    $showrelate = $this->requestAction("servers/showrelatebyid/$components->relate_id/$components->type");
                    echo $showrelate;
                ?>
                </td>
                <td class="actions">
                    <?php if($components->type == "softwares"){
                        echo $this->Html->link(__('Edit'), ['controller' => 'softwares','action' => 'edit',$components->relate_id]);
                    }elseif($components->type == "databases"){
                        echo $this->Html->link(__('Edit'), ['controller' => 'databasesofts','action' => 'edit',$components->relate_id]);
                    }else{
                        echo $this->Html->link(__('Edit'), ['controller' => 'users','action' => 'edit',$components->relate_id]);
                    } ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
