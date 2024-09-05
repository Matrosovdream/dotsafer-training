<?php if(!empty($paginator) and $paginator->hasPages()): ?>
    <nav class="d-flex justify-content-center">
        <ul class="custom-pagination d-flex align-items-center justify-content-center">
            <?php if($paginator->onFirstPage()): ?>
                <li class="previous disabled">
                    <i data-feather="chevron-left" width="20" height="20" class=""></i>
                </li>
            <?php else: ?>
                <li class="previous">
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>">
                        <i data-feather="chevron-left" width="20" height="20" class=""></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $separate = false;
                ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <?php if(($page < 2) or ($page + 1 > $paginator->lastPage()) or (($page < $paginator->currentPage() + 2) and ($page > $paginator->currentPage() - 2))): ?>
                            <?php
                                $separate = true;
                            ?>

                            <?php if($page == $paginator->currentPage()): ?>
                                <li><span class="active"><?php echo e($page); ?></span></li>
                            <?php else: ?>
                                <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>

                        <?php elseif($separate): ?>
                            <li aria-disabled="true"><span>...</span></li>

                            <?php
                                $separate = false;
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="next">
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>">
                        <i data-feather="chevron-right" width="20" height="20" class=""></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="next disabled">
                    <i data-feather="chevron-right" width="20" height="20" class=""></i>
                </li>
            <?php endif; ?>

            
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/vendor/pagination/panel.blade.php ENDPATH**/ ?>