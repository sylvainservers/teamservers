<nav class="large-3 medium-4 columns">
    <h3><?= __('Add Server') ?></h3>
    <ul class="side-nav herderbackend">
        <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
        <li class="active"><?= $this->Html->link(__('Add'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers form large-10 medium-8 columns content">
    <?= $this->Form->create($server,array("class"=>"form-horizontal")) ?>
    <fieldset>
        <?php
            echo $this->Form->input('title',array('label'=>array('text'=>'Server name: ','class'=>'control-label')));
            echo $this->Form->input('ip',array('label'=>array('text'=>'Ip: ','class'=>'control-label')));
            echo $this->Form->input('hostname',array('label'=>array('text'=>'Hostname: ','class'=>'control-label')));
            echo $this->Form->input('country',array('label'=>array('text'=>'Country: ','class'=>'control-label')));
            echo $this->Form->input('project',array('label'=>array('text'=>'Project name: ','class'=>'control-label')));
            echo $this->Form->input('status',array('label'=>array('text'=>'Ping status: ','class'=>'control-label')));
            echo $this->Form->input('memory',array('label'=>array('text'=>'Memory: ','class'=>'control-label')));
            echo $this->Form->input('disk_capacity',array('label'=>array('text'=>'Disk capacity: ','class'=>'control-label')));
            echo $this->Form->input('cpu',array('label'=>array('text'=>'CPU: ','class'=>'control-label')));
        ?>
    
        <h4><?= __('Component') ?></h4>
        <div class="newstyleadd">
            <?php echo $this->Form->input('software_id[]', ['options' => $softwares,'empty' => '-- Selected --', 'label'=>array('text'=>'Softwares: ','class'=>'control-label')]);?>
            <a href="#" class="addsoftwares"><?= __('Add new') ?></a>
        </div>
        <div class="showaddsoftwares newstyleadd"></div>
        <div class="newstyleadd">
            <?php echo $this->Form->input('databasesoft_id[]', ['options' => $databasesofts,'empty' => '-- Selected --', 'label'=>array('text'=>'Database: ','class'=>'control-label')]);?>
            <a href="#" class="adddatabases"><?= __('Add new') ?></a>
        </div>
        <div class="showadddatabases newstyleadd"></div>
        <div class="newstyleadd">
            <?php echo $this->Form->input('user_id[]', ['options' => $users,'empty' => '-- Selected --', 'label'=>array('text'=>'User: ','class'=>'control-label')]);?>
            <a href="#" class="addusers"><?= __('Add new') ?></a>
        </div>
        <div class="showaddusers newstyleadd"></div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        $(".addsoftwares").click(function(){
            var data = $(this).parent().html();
            $(".showaddsoftwares").append(data);
            $(".showaddsoftwares").find("a").remove();
            $(".showaddsoftwares").find("label").remove();
            return false;
        });
        $(".adddatabases").click(function(){
            var data = $(this).parent().html();
            $(".showadddatabases").append(data);
            $(".showadddatabases").find("a").remove();
            $(".showadddatabases").find("label").remove();
            return false;
        });
        $(".addusers").click(function(){
            var data = $(this).parent().html();
            $(".showaddusers").append(data);
            $(".showaddusers").find("a").remove();
            $(".showaddusers").find("label").remove();
            return false;
        });
    });
</script>