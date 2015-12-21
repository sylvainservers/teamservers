<?php
namespace App\Model\Table;

use App\Model\Entity\Server;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servers Model
 *
 * @property \Cake\ORM\Association\HasMany $Components
 */
class ServersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('servers');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Components', [
            'foreignKey' => 'server_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        $validator
            ->requirePresence('hostname', 'create')
            ->notEmpty('hostname');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->requirePresence('project', 'create')
            ->notEmpty('project');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('memory', 'create')
            ->notEmpty('memory');

        $validator
            ->requirePresence('disk_capacity', 'create')
            ->notEmpty('disk_capacity');

        $validator
            ->requirePresence('cpu', 'create')
            ->notEmpty('cpu');

        $validator
            ->add('create', 'valid', ['rule' => 'datetime'])
            ->requirePresence('create', 'create')
            ->notEmpty('create');

        return $validator;
    }
}
