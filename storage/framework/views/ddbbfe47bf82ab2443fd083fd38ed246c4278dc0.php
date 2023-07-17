
<?php $__env->startSection('user-content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <form action="/add-to-cart" method="POST">
                                <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded"
                                                src="<?php echo e(asset('uploads/' . $item['image'])); ?>" alt=""
                                                style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo e($item['name']); ?></span>
                                                </h5>
                                                <h4>
                                                    <span class="text-primary">Rs.<?php echo e($item['price']); ?>/-</span>
                                                </h4>
                                                <div>
                                                    <small class="fst-italic"><?php echo e($item['description']); ?></small>
                                                </div>
                                                <div>
                                                    <?php echo csrf_field(); ?>
                                                    <input type="number" min="0" max="100" value="0" name="qty[]">
                                                    <input hidden value=<?php echo e($item['id']); ?> name="product_id[]">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <input hidden value=<?php echo e($orderId); ?> name="orderid">
                                <button type="submit" class="btn btn-success">Add to cart</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <a href="/cart/<?php echo e($orderId); ?>" type="button" class="btn btn-primary">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/User/dishesshop.blade.php ENDPATH**/ ?>