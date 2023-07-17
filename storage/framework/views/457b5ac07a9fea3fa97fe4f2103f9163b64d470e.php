
<?php $__env->startSection('admin-content'); ?>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catagories</h4>
                    <div class="table-responsive">
                        <?php if(count($dishes) < 1): ?>
                            <a href="/adddish" class="btn btn-outline-success">Add new dish</a>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: aliceblue;font-size:15px;">Name</th>
                                        <th style="color: aliceblue;font-size:15px;">Catagory</th>
                                        <th style="color: aliceblue;font-size:15px;">Subcatagory</th>
                                        <th style="color: aliceblue;font-size:15px;">Price</th>
                                        <th style="color: aliceblue;font-size:15px;">Edit</th>
                                        <th style="color: aliceblue;font-size:15px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->Catagory->fromtime); ?>-<?php echo e($item->catagory->totime); ?></td>
                                            <td><?php echo e($item->SubCatagory->names); ?></td>
                                            <td><a href="/editdish/<?php echo e($item->id); ?>" class="badge badge-outline-primary">Edit</a></td>
                                            <td><a href="/deletedish/<?php echo e($item->id); ?>" class="badge badge-outline-danger">Delete</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td><a href="/adddish" class="btn btn-outline-success">Add</a></td>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/Admin/productsadd.blade.php ENDPATH**/ ?>