<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($board) ?>
            <fieldset>
                <legend><?= __('Add Board') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
