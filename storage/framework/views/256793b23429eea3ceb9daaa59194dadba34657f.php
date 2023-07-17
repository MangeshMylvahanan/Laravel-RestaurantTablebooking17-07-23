
<?php $__env->startSection('admin-content'); ?>
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: rgb(38, 38, 41);">
            <div class="row">
                <div class="d-flex justify-content-center" style="width: 600px;height:300px;">
                    <form action="/addsubcatagory" method="POST">
                        <div class="col-md-">
                            <div>
                                <label for="validationCustom07" class="form-label text-light">Catagory</label>
                                <div>
                                    <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                        name="cat_id" class="form-select" id="validationCustom07" required>
                                        <option selected disabled value="">choose..</option>
                                        <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->fromtime); ?>-<?php echo e($item->totime); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="validationCustom02" class="form-label text-light">Type of dish</label>
                                <input type="text" name="names" class="form-control" id="validationCustom02">
                                <span style="display: none" id="producterror"></span>
                            </div>
                            <br>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">Add SubCategory</button>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/SubCatagory/add.blade.php ENDPATH**/ ?>