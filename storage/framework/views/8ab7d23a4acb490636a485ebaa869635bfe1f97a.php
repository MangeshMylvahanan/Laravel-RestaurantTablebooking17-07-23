
<?php $__env->startSection('user-content'); ?>
    <!-- Reservation Start -->
    <div>
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Table details</h5>
                        <div>
                            <label class="availabletable">Available</label>
                            <label class="unavailabletable">Reserved</label>
                        </div>
                        <br>
                        
                        <form action="<?php echo e(route('tableorder')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item['status'] == 0): ?>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input disabled type="text" class="unavailabletable"name="table_no"
                                                    id="name">
                                                <p><?php echo e($item['members']); ?> Members table.</p>
                                            </div>
                                        </div>
                                    <?php elseif($item['status'] == 1): ?>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" disabled class="availabletable"name="table_no"
                                                    id="name">
                                                <p><?php echo e($item['members']); ?> Members table.</p>
                                                <p>Rs.<?php echo e($item['price']); ?>/-</p>
                                                <form action="/tableorder" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input hidden value=<?php echo e($item['price']); ?> name="amount">
                                                    <input hidden value=<?php echo e($orderId); ?> name="ord_id">
                                                    <input hidden value=<?php echo e($item['id']); ?> name="table_id">
                                                    <button class="btn btn-primary" type="submit">Book Now</button>
                                                </form>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                        </form>
                    </div>
                </div>

                
                
                

            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<style>
    .availabletable {
        background-color: #b3ffb3;
        padding-top: 10px;
        /* Bright color for available tables */
    }

    .unavailabletable {
        background-color: #d44141;
        padding-top: 10px;
        /* Dim color for unavailable tables */
        pointer-events: none;
        /* Disable pointer events on unavailable tables */
    }

    .tabletable td {
        width: 50px;
        height: 50px;
    }

    .tabletable th {
        width: 50px;
        height: 50px;
    }

    .selected {
        background-color: #66b3ff;
        /* Highlight selected table */
    }

    .empty {
        height: 25px;
    }
</style>

<?php echo $__env->make('User.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/User/tablebooking.blade.php ENDPATH**/ ?>