<sitemap>
    <?php if(! empty($tag->url)): ?>
    <loc><?php echo e(url($tag->url)); ?></loc>
    <?php endif; ?>
    <?php if(! empty($tag->lastModificationDate)): ?>
    <lastmod><?php echo e($tag->lastModificationDate->format(DateTime::ATOM)); ?></lastmod>
    <?php endif; ?>
</sitemap>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\resources\views\vendor\sitemap\sitemapIndex\sitemap.blade.php ENDPATH**/ ?>