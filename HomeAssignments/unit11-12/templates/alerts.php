<?php

require_once __DIR__.'/../functions/functions.php';

$alerts = get_alerts();
?>

<?php if (!empty($alerts)): ?>
    <section class="alerts">
        <?php foreach ($alerts as $alert): ?>
            <p class="alert <?php echo $alert['type'] ?>">
                <?php echo $alert['text']; ?>
            </p>
        <?php endforeach; ?>
    </section>
    <?php clear_alerts(); ?>
<?php endif; ?>
