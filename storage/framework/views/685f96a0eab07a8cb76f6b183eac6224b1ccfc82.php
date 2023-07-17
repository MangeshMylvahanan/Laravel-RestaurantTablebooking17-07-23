
<?php $__env->startSection('admin-content'); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <form enctype="multipart/form-data" action="/adddish" method="POST">
                    <div class="col-md-">
                        <label for="validationCustom01" class="form-label text-light">Dish Name</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01">
                        <span style="display: none" id="producterror"></span>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom02" class="form-label text-light">Price</label>
                        <input type="text" name="price" class="form-control" id="actualpriceid" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter the price.
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom05" class="form-label text-light">Description</label>
                        <textarea style="height: 100px" type="text" name="description" class="form-control" id="validationCustom05" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            mandatory.
                        </div>
                    </div>
                    <div class="col-md-">
                        <div>
                            <label for="validationCustom07" class="form-label text-light">Timeslot</label>
                            <div>
                                <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                    name="cat_id" class="form-select" id="validationCustom07" required>
                                    <option selected disabled value="">choose..</option>
                                    <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item->id); ?>>
                                            <?php echo e($item->fromtime); ?>-<?php echo e($item->totime); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="validationCustom08" class="form-label text-light">Sub-Catagory</label>
                            <div>
                                <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                    name="subcat_id" class="form-select" id="validationCustom08" required>
                                    <option selected disabled value="">choose..</option>
                                    <?php $__currentLoopData = $subcatagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item->id); ?>>
                                            <?php echo e($item->names); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Please select a valid subcatagory.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom09" class="form-label text-light">Chef Name</label>
                        <input type="text" name="chef" class="form-control"
                            id="validationCustom09" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            mandatory.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom11" class="form-label text-light">Chef Image</label>
                            <div>
                                <input type="file" name="chef_image" class="form-control" id="validationCustom11"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom10" class="form-label text-light">Dish image</label>
                            <div>
                                <input type="file" multiple name="image" class="form-control" id="validationCustom10"
                                    required>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Please select a product images.
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Add Dish</button>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/Dish/add.blade.php ENDPATH**/ ?>