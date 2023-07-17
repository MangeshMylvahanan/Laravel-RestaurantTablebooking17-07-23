
<?php $__env->startSection('admin-content'); ?>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catagories</h4>
                    <div class="table-responsive">
                        <?php if(count($tables) < 1): ?>
                            <a href="/addtable" class="btn btn-outline-success">Add Table</a>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: aliceblue;font-size:15px;">Table No</th>
                                        <th style="color: aliceblue;font-size:15px;">Price</th>
                                        <th style="color: aliceblue;font-size:15px;">Members</th>
                                        <th style="color: aliceblue;font-size:15px;">Status</th>
                                        <th style="color: aliceblue;font-size:15px;">Edit</th>
                                        <th style="color: aliceblue;font-size:15px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->number); ?></td>
                                            <td><?php echo e($item->price); ?></td>
                                            <td><?php echo e($item->members); ?></td>
                                            <?php if( $item->status == 1 ): ?>
                                            <td><a href="#" class="badge badge-outline-success">Available</a></td>
                                            <?php else: ?>
                                            <td><a href="#" class="badge badge-outline-danger">Booked</a></td>
                                            <?php endif; ?>
                                            <td><a href="/edittable/<?php echo e($item->id); ?>" class="badge badge-outline-primary">Edit</a></td>
                                            <td><a href="/deletetable/<?php echo e($item->id); ?>" class="badge badge-outline-danger">Delete</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td><a href="/addtable" class="btn btn-outline-success">Add</a></td>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/Admin/table.blade.php ENDPATH**/ ?>