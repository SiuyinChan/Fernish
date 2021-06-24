<nav>
    <ul class="pagination">        
        <?php for ($page=1; $page<=$totalPages; $page++):?>
        <li>
            <a class="page-item <?= ($currentPage == $page)? "selected" : ""; ?>" href="../../index.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
        </li>
    <?php endfor ?>
        <li>
            <a class="page-item <?= ($currentPage == $totalPages) ? "disabled" : "" ?>" href="../../index.php?page= <?= $currentPage + 1 ?>" class="page-link"> > </a>
        </li>            
    </ul>
</nav>