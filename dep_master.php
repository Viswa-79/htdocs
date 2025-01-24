<!DOCTYPE html>
<?php include "config.php"; ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Users List Table -->

<div class="mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-success">DESIGNATION&nbsp;LIST</button><br>
                      

                      <div class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="adddia();" aria-controls="DataTables_Table_0" class="btn btn-primary" style="color: white;"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  Tools
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                           
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>
                    </div>
          
               
                 <!-- Teams Cards -->
                 <div class=" row g-4">
               
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/vue-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Vue.js Dev Team</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        The development of Vue and its ecosystem is guided by an international team, some of whom have
                        chosen to be featured below.
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Kaith D'souza"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="John Doe"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Alan Walker"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="14 more"
                                >+14</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img src="../../assets/img/icons/brands/xd-label.png" alt="Avatar" class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Creative Designers</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        A design or product team is more than just the people on it. A team includes the people, the
                        roles they play.
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Jimmy Ressula"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Kristi Lawker"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Danny Paul"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/7.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="19 more"
                                >+19</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;" class="me-2"><span class="badge bg-label-warning">Sketch</span></a>
                          <a href="javascript:;"><span class="badge bg-label-danger">XD</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/support-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Support Team</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        Support your team. Your customer support team is fielding the good, the bad, and the ugly day in
                        and day out.
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Andrew Tye"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Rishi Swaat"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Rossie Kim"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="14 more"
                                >+21</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;"><span class="badge bg-label-info">Zendesk</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Digital Marketing</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        Digital marketing refers to advertising delivered through digital channels such as search
                        engines, websites…
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Kim Merchent"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Sam D'souza"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Nurvi Karlos"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="53 more"
                                >+53</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;" class="me-2"><span class="badge bg-label-primary">Twitter</span></a>
                          <a href="javascript:;"><span class="badge bg-label-success">Email</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/event-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Event</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        Event is defined as a particular contest which is part of a program of contests. An example of
                        an event is the long…
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Vinnie Mostowy"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Allen Rieske"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/8.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Julee Rossignol"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/7.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="32 more"
                                >+32</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;"><span class="badge bg-label-success">Hubilo</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/figma-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Figma Resources</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        Explore, install, use, and remix thousands of plugins and files published to the Figma Community
                        by designers and developers.
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Andrew Mostowy"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Micky Ressula"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Michel Pal"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="22 more"
                                >+22</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;" class="me-2"><span class="badge bg-label-success">UI/UX</span></a>
                          <a href="javascript:;"><span class="badge bg-label-secondary">Figma</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="javascript:;" class="d-flex align-items-center">
                          <div class="avatar me-2">
                            <img
                              src="../../assets/img/icons/brands/html-label.png"
                              alt="Avatar"
                              class="rounded-circle" />
                          </div>
                          <div class="me-2 text-body h5 mb-0">Only Beginners</div>
                        </a>
                        <div class="ms-auto">
                          <ul class="list-inline mb-0 d-flex align-items-center">
                            <li class="list-inline-item me-0">
                              <a href="javascript:void(0);" class="d-flex align-self-center text-body"
                                ><i class="ti ti-star text-muted me-1"></i
                              ></a>
                            </li>
                            <li class="list-inline-item">
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn dropdown-toggle hide-arrow p-0"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <i class="ti ti-dots-vertical text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider" />
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <p class="mb-3">
                        Learn the basics of how websites work, front-end vs back-end, and using a code editor. Learn
                        basic HTML, CSS, and…
                      </p>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Kim Karlos"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Katy Turner"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Peter Adward"
                              class="avatar avatar-sm pull-up">
                              <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li class="avatar avatar-sm">
                              <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="41 more"
                                >+41</span
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:;" class="me-2"><span class="badge bg-label-info">CSS</span></a>
                          <a href="javascript:;"><span class="badge bg-label-warning">HTML</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Teams Cards -->
                <!-- Offcanvas to add new user -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Designation</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post">
                      <div class="mb-3">
                      <label class="form-label" hidden for="add-user-fullname">ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder=""
                          name="id"
                          hidden
                          aria-label="John Doe" />
                      </div>
                  
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Designation</label>
                        <input
                          type="text"
                          class="form-control"
                          id="designation"
                          placeholder=""
                          name="designation"
                          aria-label="John Doe" required/>
                      </div>
                      
                    
                      
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 
<button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
            
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  
  $id=$_POST['id'];   
  $designation=$_POST['designation'];
  
  if($id==""){
 $sql="insert into desig_master (designation) values('$designation')"; 
$result1=mysqli_query($conn, $sql);

}
else{
 echo $sql="UPDATE desig_master SET designation='$designation' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);

}
if($result1) { 
  echo "<script>alert('Designation Registered Successfully');window.location='product_designation.php';</script>";
}
else if($result2) { 
  echo "<script>alert('Designation Updated Successfully');window.location='product_designation.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}
}
?>  

<script>
function getdia(id) {
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#id').val(data.id);  
   $('#designation').val(data.designation);             
}

      }
    };
    xmlhttp.open("GET","ajax/getdesig.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function adddia() {
  document.getElementById('form-title').innerHTML='Add';
  $('#id').val('');  
   $('#designation').val('');      
}
</script>

<script>
function deldia(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='product_designation.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/deldesig.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>