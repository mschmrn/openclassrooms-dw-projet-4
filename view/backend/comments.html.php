<section id="comments" class="bg-info ">
	<div class="container-fluid py-5">
        <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="text-secondary">Commentaires</h1>
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
                <form action="index.php?controller=admin&task=viewComments" method="POST">
                    <div class="card border-0">
                        <div class="card-header px-xl-0 bg-info border-0">
                            <ul class="nav nav-tabs card-header-tabs start-between">
                                <li class="nav-item">
                                    <button class="btn" type="submit" name="comment" value="comments" id="comments" active>
                                        <h4 class="color-hover<?php if($param == 'comments'){ $condition = 'published'; ?> text-primary border border-top-0 border-right-0 border-left-0 border-primary border-bottom <?php } ?> ">Publiés <sup>(<?= count($published) ?>)</sup></h4>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="btn" type="submit" name="comment" id="pending" value="pending">
                                        <h4 class="color-hover<?php if($param == 'pending'){ $condition = 'pending'; ?> text-primary border border-top-0 border-right-0 border-left-0 border-primary border-bottom<?php } ?> ">En attente <sup>(<?= count($pending) ?>)</sup></h4>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="btn" type="submit" name="comment" value="reported" id="reported">
                                        <h4 class="color-hover<?php if($param == 'reported'){ $condition = 'reported';?> text-primary border border-top-0 border-right-0 border-left-0 border-primary border-bottom<?php } ?> ">Signalés <sup>(<?= count($reported) ?>)</sup></h4>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body bg-info p-0">
                        <!-- ARTICLES LIST -->
                            <?php
                                require_once("view/backend/list/comments.php");
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>
    
