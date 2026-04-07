<?php $__env->startSection('title', 'Students List'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Students List</h1>
        <a href="<?php echo e(route('students.create')); ?>" class="bg-blue-600 text-white px-5 py-2 rounded shadow hover:bg-blue-700 transition duration-200">
            Add New Student
        </a>
    </div>

    <!-- Search Form -->
<form action="<?php echo e(route('students.index')); ?>" method="GET" class="mb-4 flex gap-2">
    <input type="text" name="search" 
    value="<?php echo e(request('search')); ?>"
     placeholder="Search by ID name course  registration number...." 
    class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 
    focus:ring-blue-400">
        
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition duration-200"
    >Search</button>
</form>

    <!-- Table Container -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-4">
            <h2 class="text-white font-semibold text-lg">All Students</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reg. No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->id); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->name); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->email); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->registration_number); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->course); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($student->year); ?></td>
                            
                            <!-- Photo column -->
                            <td class="px-6 py-4 whitespace-nowraps">
                                <?php if($student->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . $student->photo)); ?>" alt="Photo" class="w-12 h-12 rounded-full object-cover shadow-md border-2 border-blue-500 ">
                                   

                                <?php else: ?>
                                    <span class="text-gray-500">No photo</span>
                                <?php endif; ?>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">

                                 
                                <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="bg-yellow-400 text-white px-3 py-1 rounded shadow hover:bg-yellow-500 transition duration-200">Edit</a>
                                    
                                    <a href="<?php echo e(route('students.show', $student->id)); ?>" class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600 transition duration-200">View</a>
                                    
                                    

                                <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600 transition duration-200">Delete</button>
                                </form>
                               


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Pagination -->
<div class="mt-4 flex justify-center">
    <?php echo e($students->links()); ?>

</div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\campus-link\resources\views/students/index.blade.php ENDPATH**/ ?>