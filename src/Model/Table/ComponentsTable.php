<?php
namespace App\Model\Table;

use App\Model\Entity\Component;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Components Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servers
 * @property \Cake\ORM\Association\BelongsTo $Databasesofts
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ComponentsTable extends Table
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

        $this->table('components');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Servers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
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

        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['server_id'], 'Servers'));
        return $rules;
    }
    
    public function deleterelationship($id=null,$type=null){
        if($type == "softwares"){
            $this->Components->deleteAll(array("conditions"=>array('relate_id'=>$id,'type'=>'softwares')),false);
        }
    }
}
