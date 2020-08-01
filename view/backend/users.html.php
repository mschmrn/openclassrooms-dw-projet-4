<section id="users" class="bg-info ">
    <div class="container-fluid py-5">
        <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="text-secondary">Utilisateurs</h1>
                </div>
            </div>
        </div>
        <!-- SEPARATOR -->
        <div class="row mx-auto mb-2">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
        </div>
        <!-- NAV -->
        <div class="row mx-auto mt-2">
            <div class="col-12">
                <form action="index.php?controller=admin&task=viewUsers" method="POST">
                    <div class="card border-0">
                        <div class="card-header px-xl-0 bg-info border-0">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <button class="btn" type="submit" name="user_type" value="admin" id="admin" active>
                                        <h4 class="color-hover<?php if($type == 'admin'){ $condition = 'admin'; ?> text-primary border border-top-0 border-right-0 border-left-0 border-primary border-bottom <?php } ?> ">Administrateurs <sup>(<?= count($users) ?>)</sup></h4>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="btn mx-3" type="submit" name="user_type" id="regular" value="regular">
                                        <h4 class="color-hover<?php if($type == 'regular'){ $condition = 'user'; ?> text-primary border border-top-0 border-right-0 border-left-0 border-primary border-bottom<?php } ?> ">Utilisateurs <sup>(<?= count($users) ?>)</sup></h4>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body bg-info p-0">
                        <!-- ARTICLES LIST -->
                            <?php
                                require_once("view/backend/list/users.php");
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>