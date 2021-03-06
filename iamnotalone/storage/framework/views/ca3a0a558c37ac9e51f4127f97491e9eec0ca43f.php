<div class="bg-primary text-white px-4 sm:px-8 py-4 text-xs sm:text-sm">
    <a href="https://screening.mhanational.org/screening-tools/?ref=NotAlone">Take a Mental Health Test</a>
    <span class="float-right uppercase">
        <?php if(auth()->guard()->check()): ?>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="lg:inline-flex lg:w-auto w-full rounded text-white text-sm font-bold uppercase items-center justify-center">
                    <span><?php echo e(Auth::user()->first_name); ?></span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-10 right-0 md:right-0  w-36 mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                <div class="px-2 py-2 bg-white text-black rounded-md shadow dark-mode:bg-gray-800">
                    <a class="block text-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 hover:text-white focus:text-gray-900 hover:bg-indigo-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="<?php echo e(route('event.user')); ?>">My Events</a>
                    <a class="block text-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  hover:text-white focus:text-gray-900 hover:bg-indigo-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="<?php echo e(route('signout')); ?>">Signout</a>
                </div>
                </div>
            </div>   
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('register')); ?>" class="border-r border-gray-100 pr-2 sm:px-3" id="register">Create Account</a>
            <a href="<?php echo e(route('login')); ?>" class="pl-2 sm:px-3" id="login">Login</a> 
        <?php endif; ?>
    </span>
</div><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/partials/topnav.blade.php ENDPATH**/ ?>