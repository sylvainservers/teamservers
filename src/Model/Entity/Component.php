<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Component Entity.
 *
 * @property int $id
 * @property int $server_id
 * @property \App\Model\Entity\Server $server
 * @property int $databasesoft_id
 * @property \App\Model\Entity\Databasesoft $databasesoft
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $create
 */
class Component extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
