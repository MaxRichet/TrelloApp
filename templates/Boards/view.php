<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Board'), ['action' => 'edit', $board->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Board'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Boards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Board'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add user'), ['controller' => 'usersboards', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <h3><?= h($board->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($board->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($board->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $this->Number->format($board->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($board->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($board->modified) ?></td>
                </tr>
            </table>

            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($board->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($board->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->firstname) ?></td>
                            <td><?= h($users->lastname) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="column-responsive column-80">
                <div class="users form content">
                    <?= $this->Form->create($newCategory, ['url' => ['controller' => 'Categories', 'action' => 'add']]) ?>
                    <fieldset>
                        <legend><?= __('Add Category') ?></legend>
                        <?php
                            echo $this->Form->control('name');
                            echo $this->Form->control('color', ['type' => 'color']);
                        ?>
                        <?= $this->Form->hidden('board_id', ['value' => $board->id]) ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
    </div>

    <?php foreach ($board->categories as $category) : ?>
        <div class="content button">
            <div>
                <h3><?= h($category->name) ?></h3>
                <?= $this->Html->link('Modifier' , 
                ['controller' => 'Categories', 'action' => 'edit', $category->id], 
                ['class' => 'button']
                ) ?> 
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $category->id], ['class' => 'button', 'confirm' => 'Etes-vous sur ?']) ?>
                    <table>
                        <tr style="background:<?= $category->color ?>;">
                            <th><?= __('Color') ?></th>
                            <td><?= h($category->color) ?></td>
                        </tr>
                    </table>
            </div>
        <div class="row">
            <div class="column-responsive column-80">
                <div>
                    <?= $this->Form->create($newCard, ['url' => ['controller' => 'Cards', 'action' => 'add']]) ?>
                    <fieldset>
                        <legend><?= __('Add Card') ?></legend>
                        <?php
                            echo $this->Form->control('title');
                            echo $this->Form->control('description');
                            echo $this->Form->control('assignee');
                            echo $this->Form->control('deadline', ['type' => 'date']);
                        ?>
                        <?= $this->Form->hidden('category_id', ['value' => $category->id]) ?>
                        <?= $this->Form->hidden('board_id', ['value' => $board->id]) ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div>
            <?php foreach ($category->cards as $card) : ?>
                <h3><?= h($card->title) ?></h3>
                    <table>
                        <tr>
                            <th><?= __('Description') ?></th>
                            <td><?= h($card->description) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('assignee') ?></th>
                            <td><?= h($card->assignee) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('deadline') ?></th>
                            <td><?= h($card->deadline) ?></td>
                        </tr>
                        <td>
                            <?= $this->Html->link('Modifier' , 
                            ['controller' => 'Cards', 'action' => 'edit', $card->id], ['class' => 'button']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cards', 'action' => 'delete', $card->id], ['class' => 'button', 'confirm' => 'Etes-vous sur ?']) ?>
                        </td>
                    </table>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
