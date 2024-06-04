 <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
     <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
         <div x-show="open" x-transition x-transition.duration.300
             class="panel my-8 w-full max-w-[300px] overflow-hidden rounded-lg border-0 bg-secondary p-0 dark:bg-secondary">
             <div class="flex items-center justify-end pt-4 text-white ltr:pr-4 rtl:pl-4 dark:text-white-light">
                 <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round" class="h-6 w-6">
                         <line x1="18" y1="6" x2="6" y2="18"></line>
                         <line x1="6" y1="6" x2="18" y2="18"></line>
                     </svg>
                 </button>
             </div>
             <div class="p-5">
                 <div class="py-5 text-center text-white dark:text-white-light">
                     <div class="mx-auto mb-7 h-20 w-20 overflow-hidden rounded-full">
                         <img src="assets/images/profile-16.jpeg" alt="image" class="h-full w-full object-cover" />
                     </div>
                     <p class="font-semibold">Click on view to access <br />your
                         profile. {{ $item->level }}</p>
                 </div>
                 <div class="flex justify-center gap-4 p-5">
                     <button type="button" class="btn dark:btn-dark bg-white text-black">View</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
