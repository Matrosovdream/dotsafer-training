<div class="product-card">
    <figure>
        <div class="image-box">
            <a href="<?php echo e($product->getUrl()); ?>" class="image-box__a">
                <?php
                    $hasDiscount = $product->getActiveDiscount();
                ?>

                <div class="badges-lists">
                    <?php if($product->getAvailability() < 1): ?>
                        <span class="out-of-stock-badge">
                            <span><?php echo e(trans('update.out_of_stock')); ?></span>
                        </span>
                    <?php elseif($hasDiscount): ?>
                        <span class="badge badge-danger"><?php echo e(trans('public.offer',['off' => $hasDiscount->percent])); ?></span>
                    <?php elseif($product->isPhysical() and empty($product->delivery_fee)): ?>
                        <span class="badge badge-warning"><?php echo e(trans('update.free_shipping')); ?></span>
                    <?php endif; ?>

                        <?php echo $__env->make('web.default.includes.product_custom_badge', ['itemTarget' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <img src="<?php echo e($product->thumbnail); ?>" class="img-cover" alt="<?php echo e($product->title); ?>">
            </a>

            <?php if($product->getAvailability() > 0): ?>
                <div class="hover-card-action">
                    <button type="button" data-id="<?php echo e($product->id); ?>" class="btn-add-product-to-cart d-flex align-items-center justify-content-center border-0 cursor-pointer">
                        <i data-feather="shopping-cart" width="20" height="20" class=""></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <figcaption class="product-card-body">
            <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="<?php echo e($product->creator->getAvatar()); ?>" class="img-cover" alt="<?php echo e($product->creator->full_name); ?>">
                </div>
                <a href="<?php echo e($product->creator->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($product->creator->full_name); ?></a>
            </div>

            <a href="<?php echo e($product->getUrl()); ?>">
                <h3 class="mt-15 product-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($product->title,'title')); ?></h3>
            </a>

            <?php if(!empty($product->category)): ?>
                <span class="d-block font-14 mt-10"><?php echo e(trans('public.in')); ?> <a href="/products?category_id=<?php echo e($product->category->id); ?>" target="_blank" class="text-decoration-underline"><?php echo e($product->category->title); ?></a></span>
            <?php endif; ?>

            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $product->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="product-price-box mt-25">
                <?php if(!empty($isRewardProducts) and !empty($product->point)): ?>
                    <span class="text-warning real font-14"><?php echo e($product->point); ?> <?php echo e(trans('update.points')); ?></span>
                <?php elseif($product->price > 0): ?>
                    <?php if($product->getPriceWithActiveDiscountPrice() < $product->price): ?>
                        <span class="real"><?php echo e(handlePrice($product->getPriceWithActiveDiscountPrice(), true, true, false, null, true, 'store')); ?></span>
                        <span class="off ml-10"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/products/includes/card.blade.php ENDPATH**/ ?>