<div class="sidebar-wrapper">
         <div>
                  <div class="logo-wrapper">
                           <a href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
                           <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                           <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
                  </div>
                  <div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
                  <nav class="sidebar-main">
                           <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                           <div id="sidebar-menu">
                                    <ul class="sidebar-links" id="simple-bar">
                                             <li class="back-btn">
                                                      <a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
                                                      <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                             </li>
                                             <li class="sidebar-main-title">
                                                      <div>
                                                               <h6 class="lan-1"><?php echo e(trans('lang.General')); ?> </h6>
                                                               <p class="lan-2"><?php echo e(trans('lang.Dashboards,widgets & layout.')); ?></p>
                                                      </div>
                                             </li>
                                             
                                             <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='dashboard' ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>"><i data-feather="home"> </i><span><?php echo e(trans('lang.Dashboards')); ?></span></a></li>

                                             <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e((Route::currentRouteName()=='karyawan' || Route::currentRouteName()=='add-karyawan' || Route::currentRouteName()=='edit-karyawan') ? 'active' : ''); ?>" href="<?php echo e(route('karyawan')); ?>"><i data-feather="users"> </i><span>Karyawan</span></a></li>
                                             <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e((Route::currentRouteName()=='jabatan' || Route::currentRouteName()=='add-jabatan' || Route::currentRouteName()=='edit-jabatan') ? 'active' : ''); ?>" href="<?php echo e(route('jabatan')); ?>"><i data-feather="briefcase"> </i><span>Jabatan</span></a></li>



                                    </ul>
                           </div>
                           <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                  </nav>
         </div>
</div>
<?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>