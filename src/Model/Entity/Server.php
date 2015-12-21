<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Server Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $ip
 * @property string $hostname
 * @property string $country
 * @property string $project
 * @property string $status
 * @property string $ping
 * @property string $detail
 * @property int $memory
 * @property int $disk_capacity
 * @property string $cpu
 * @property \Cake\I18n\Time $create
 * @property \App\Model\Entity\Component[] $components
 */
class Server extends Entity
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
