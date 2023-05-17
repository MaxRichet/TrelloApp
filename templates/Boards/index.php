<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Board> $boards
 */
?>
<div class="boards index content">
    <?= $this->Html->link(__('New Board'), ['action' => 'add'], ['class' => 'view-index']) ?>
    <h3><?= __('Boards') ?></h3>
    <div class="table-responsive">
        <table>
            <tbody>
                <?php foreach ($boards as $board): ?>
                <tr>
                    <td><?= $this->Number->format($board->id) ?></td>
                    <td><?= $this->Number->format($board->owner) ?></td>
                    <td><?= $this->Html->link((h($board->name)), ['action' => 'view', $board->id]) ?></td>
                    <td><?= h($board->created) ?></td>
                    <td><?= h($board->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $board->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $board->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
