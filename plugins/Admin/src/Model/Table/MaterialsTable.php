<?php
declare(strict_types=1);

namespace Admin\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materials Model
 *
 * @method \Admin\Model\Entity\Material newEmptyEntity()
 * @method \Admin\Model\Entity\Material newEntity(array $data, array $options = [])
 * @method array<\Admin\Model\Entity\Material> newEntities(array $data, array $options = [])
 * @method \Admin\Model\Entity\Material get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Admin\Model\Entity\Material findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Admin\Model\Entity\Material patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Admin\Model\Entity\Material> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Admin\Model\Entity\Material|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Admin\Model\Entity\Material saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Admin\Model\Entity\Material>|\Cake\Datasource\ResultSetInterface<\Admin\Model\Entity\Material>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Admin\Model\Entity\Material>|\Cake\Datasource\ResultSetInterface<\Admin\Model\Entity\Material> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Admin\Model\Entity\Material>|\Cake\Datasource\ResultSetInterface<\Admin\Model\Entity\Material>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Admin\Model\Entity\Material>|\Cake\Datasource\ResultSetInterface<\Admin\Model\Entity\Material> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MaterialsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('materials');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('text')
            ->allowEmptyString('text');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }
}
