<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity.
 *
 * @property int $id
 * @property int $software_id
 * @property \App\Model\Entity\Software $software
 * @property string $title
 * @property \Cake\I18n\Time $create
 */
class Module extends Entity
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
