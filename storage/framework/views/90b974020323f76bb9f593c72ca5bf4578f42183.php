
<?php $__env->startSection('admin-content'); ?>
<div class="main-panel">
    <div class="content-wrapper" style="background-color: rgb(38, 38, 41);">
        <div class="row">
            <div class="d-flex justify-content-center" style="width: 600px;height:300px;">
                <form action="/updatesubcatagory" method="POST">
                    
                    <div class="col-md">
                        <label for="validationCustom02" class="form-label text-light">Type of the dish</label>
                        <input type="text" name="names" value=<?php echo e($catagory->names); ?> class="form-control" id="validationCustom02">
                        <span style="display: none" id="producterror"></span>
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    <input type="hidden" name="id" value="<?php echo e($catagory->id); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/SubCatagory/update.blade.php ENDPATH**/ ?>