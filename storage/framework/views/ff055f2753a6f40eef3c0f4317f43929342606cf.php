
<?php $__env->startSection('user-content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <form action="/pay" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded"
                                                src="<?php echo e(asset('uploads/' . $item->image)); ?>" alt=""
                                                style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo e($item->name); ?></span>
                                                </h5>
                                                <h4>
                                                    <span class="text-primary">Rs.<?php echo e($item->price); ?>/-</span>
                                                </h4>
                                                <div>
                                                    <small class="fst-italic"><?php echo e($item->description); ?></small>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="orderid[]"
                                                        value="<?php echo e($cart[$index]->order_id); ?>">
                                                    <label>Quantity: <?php echo e($cart[$index]->qty); ?></label>
                                                    <label>Total Amount:
                                                        Rs.<?php echo e($cart[$index]->qty * $item->price); ?>/-</label>
                                                    <input type="hidden" name="totalAmount[]"
                                                        value="<?php echo e($cart[$index]->qty * $item->price); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/cart.blade.php ENDPATH**/ ?>