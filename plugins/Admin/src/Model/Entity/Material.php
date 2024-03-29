<?php
declare(strict_types=1);

namespace Admin\Model\Entity;

use Cake\ORM\Entity;

/**
 * Material Entity
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string|null $text
 * @property string|null $image
 * @property int $status
 * @property \Cake\I18n\DateTime $created_at
 * @property \Cake\I18n\DateTime $updated_at
 */
class Material extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'slug' => true,
        'title' => true,
        'text' => true,
        'image' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
