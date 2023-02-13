

<?php $__env->startSection('content'); ?>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD QWORD</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="<?php echo e(route('brng.create')); ?>"> Input barang</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('succes')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>NIS</th>
            <th width="280px"class="text-center">Nama barang</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $brng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e(++$i); ?></td>
            <td><?php echo e($barang->kd_barang); ?></td>
            <td><?php echo e($barang->nm_barang); ?></td>
            <td><?php echo e($barang->tipe); ?></td>
            <td class="text-center">
                <form action="<?php echo e(route('brng.destroy',$barang->id)); ?>" method="POST">

                   <a class="btn btn-info btn-sm" href="<?php echo e(route('brng.show',$barang->id)); ?>">Show</a>

                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('brng.edit',$barang->id)); ?>">Edit</a>

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $brng->links(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\qword\resources\views/index.blade.php ENDPATH**/ ?>