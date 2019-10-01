<div class="box-comment">

    <div class="comment-text row">
        <span class="username col-md-3">
            Course Statues:
        </span><!-- /.username -->
        <span class="col-md-9">
            It is a long established fact that a reader will be distracted
            by the readable content of a page when looking at its layout.
        </span>
    </div>
    <!-- /.comment-text -->
</div>
<!-- /.box-comment -->
<div class="box-comment">

    <div class="comment-text row">
        <span class="username">
            Course Mat
        </span><!-- /.username -->
        <?php
        for ($k = 1; $k <= $r; $k++) {
            echo '<div class="box collapsed-box">
                                                        <div class="box-header">
                                                            <div class="box-tools pull-left">
                                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <h3 class="box-title">Topic ' . $k . ': Introduction to Psychology</h3>
                                                            <!-- /.box-tools -->
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <p><a href="#">materials name</a></p>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>';
        }
        ?>
    </div>
    <!-- /.comment-text -->
</div>
<!-- /.box-comment -->
</div>