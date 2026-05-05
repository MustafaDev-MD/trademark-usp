<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Lead</title>
</head>
<body>
    <h2>New Trademark Lead</h2>

    <p><strong>Name:</strong> <?php echo e($lead->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($lead->email); ?></p>
    <p><strong>Phone:</strong> <?php echo e($lead->phone); ?></p>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lead->message): ?>
        <p><strong>Message:</strong><br><?php echo e($lead->message); ?></p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/emails/lead.blade.php ENDPATH**/ ?>