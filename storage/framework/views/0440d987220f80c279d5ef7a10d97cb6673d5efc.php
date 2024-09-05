<div id="topFilters" class="shadow-lg border border-gray300 rounded-sm p-10 p-md-20">
    <div class="row align-items-center">
        <div class="col-lg-3 d-flex align-items-center">
            <div class="checkbox-button primary-selected">
                <input type="radio" name="card" id="gridView" value="grid" <?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?> checked="checked" <?php endif; ?>>
                <label for="gridView" class="bg-white border-0 mb-0">
                    <i data-feather="grid" width="25" height="25" class="<?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?> text-primary <?php endif; ?>"></i>
                </label>
            </div>

            <div class="checkbox-button primary-selected ml-10">
                <input type="radio" name="card" id="listView" value="list" <?php if(!empty(request()->get('card')) and request()->get('card') == 'list'): ?> checked="checked" <?php endif; ?>>
                <label for="listView" class="bg-white border-0 mb-0">
                    <i data-feather="list" width="25" height="25" class="<?php echo e((!empty(request()->get('card')) and request()->get('card') == 'list') ? 'text-primary' : ''); ?>"></i>
                </label>
            </div>
        </div>

        <div class="col-lg-6 d-block d-md-flex align-items-center justify-content-end my-25 my-lg-0">
            <div class="d-flex align-items-center justify-content-between justify-content-md-center mx-0 mx-md-20 my-20 my-md-0">
                <label class="mb-0 mr-10 cursor-pointer" for="upcoming"><?php echo e(trans('panel.upcoming')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="upcoming" class="custom-control-input" id="upcoming" <?php if(request()->get('upcoming', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="upcoming"></label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                <label class="mb-0 mr-10 cursor-pointer" for="free"><?php echo e(trans('public.free')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="free" class="custom-control-input" id="free" <?php if(request()->get('free', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="free"></label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between justify-content-md-center mx-0 mx-md-20 my-20 my-md-0">
                <label class="mb-0 mr-10 cursor-pointer" for="discount"><?php echo e(trans('public.discount')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="discount" class="custom-control-input" id="discount" <?php if(request()->get('discount', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="discount"></label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                <label class="mb-0 mr-10 cursor-pointer" for="download"><?php echo e(trans('home.download')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="downloadable" class="custom-control-input" id="download" <?php if(request()->get('downloadable', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="download"></label>
                </div>
            </div>
        </div>

        <div class="col-lg-3 d-flex align-items-center">
            <select name="sort" class="form-control font-14">
                <option disabled selected><?php echo e(trans('public.sort_by')); ?></option>
                <option value=""><?php echo e(trans('public.all')); ?></option>
                <option value="newest" <?php if(request()->get('sort', null) == 'newest'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.newest')); ?></option>
                <option value="expensive" <?php if(request()->get('sort', null) == 'expensive'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.expensive')); ?></option>
                <option value="inexpensive" <?php if(request()->get('sort', null) == 'inexpensive'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.inexpensive')); ?></option>
                <option value="bestsellers" <?php if(request()->get('sort', null) == 'bestsellers'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.bestsellers')); ?></option>
                <option value="best_rates" <?php if(request()->get('sort', null) == 'best_rates'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.best_rates')); ?></option>
            </select>
        </div>

    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/pages/includes/top_filters.blade.php ENDPATH**/ ?>