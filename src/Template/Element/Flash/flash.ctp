
<div class="alert alert-<?= h($params['type']) ?> dismissible">
    <?= h($message) ?>
    <a href="javascript:void(0)" class="close flashMsg" onclick="$(this).parent().fadeOut();return false;">&times;</a>
</div>

