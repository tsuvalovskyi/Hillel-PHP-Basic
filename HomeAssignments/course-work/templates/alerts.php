<?php

require_once __DIR__ . '/../functions/alerts.php';

$alerts = get_alerts();
?>

<?php if (!empty($alerts)): ?>

    <section class="alerts">
        <?php foreach ($alerts as $alert): ?>
            <div class="alert alert-<?php echo $alert['type'] ?> mb-3 mt-3" role="alert">
                <?php echo $alert['text']; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <?php flush_alerts(); ?>
<?php endif; ?>

