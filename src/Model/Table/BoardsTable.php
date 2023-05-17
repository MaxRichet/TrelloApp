<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Boards Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\HasMany $Categories
 * @property \App\Model\Table\LogsTable&\Cake\ORM\Association\HasMany $Logs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Board newEmptyEntity()
 * @method \App\Model\Entity\Board newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Board[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Board get($primaryKey, $options = [])
 * @method \App\Model\Entity\Board findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Board patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Board[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Board|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BoardsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('boards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Categories', [
            'foreignKey' => 'board_id',
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'board_id',
            'cascadeCallbacks' => true,
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'board_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_boards',
        ]);
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
            ->integer('owner')
            ->requirePresence('owner', 'create')
            ->notEmptyString('owner');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
