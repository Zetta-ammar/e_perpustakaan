<?php
use CodeIgniter\Pager\PagerRenderer;

/** @var PagerRenderer $pager */
$pager->setSurroundCount(2);
?>

<?php if ($pager->getPageCount() > 1): ?>
    <nav aria-label="Navigasi halaman">
        <ul class="pagination mb-0">
            <?php if ($pager->hasPreviousPage()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Halaman sebelumnya">&laquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            <?php endif; ?>

            <?php foreach ($pager->links() as $link): ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
                </li>
            <?php endforeach; ?>

            <?php if ($pager->hasNextPage()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Halaman berikutnya">&raquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
