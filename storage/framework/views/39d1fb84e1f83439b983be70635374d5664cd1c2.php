
<?php $__env->startSection('admin-content'); ?>
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: rgb(38, 38, 41);">
            <div class="row">
                <div class="d-flex justify-content-center" style="width: 600px;height:300px;">
                    <form action="/addtable" method="POST">
                            <div class="col-md">
                                <label for="validationCustom02" class="form-label text-light">Table No</label>
                                <input type="text" name="number" class="form-control" id="validationCustom02">
                                <span style="display: none" id="producterror"></span>
                            </div>
                            <div class="col-md">
                                <label for="validationCustom02" class="form-label text-light">Price</label>
                                <input type="text" name="price" class="form-control" id="validationCustom02">
                                <span style="display: none" id="producterror"></span>
                            </div>
                            <div class="col-md-">
                            <div>
                                <label for="validationCustom07" class="form-label text-light">Members</label>
                                <div>
                                    <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                        name="members" class="form-select" id="validationCustom07" required>
                                        <option selected disabled value="">choose..</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">Add table</button>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/Table/add.blade.php ENDPATH**/ ?>