
    <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Licence</span>
                                    <span class="info-box-number">Premium</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">SIA-Yasika Ver</span>
                                    <span class="info-box-number">0.5.3</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Admin</span>
                                    <span class="info-box-number"><?php echo 0 ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">User</span>
                                    <span class="info-box-number"><?php echo 0 ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                        </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Title</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-center"><strong>xxx</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-center text-uppercase"><strong>Resources</strong></p>
                                            <div class="progress-group">
                                                <span class="progress-text">Disk use space</span>
                                                <span class="progress-number"><strong><?php echo byte_format($disk_usespace, 2); ?></strong>/<?php echo byte_format($disk_totalspace, 2); ?></span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="<?php echo $disk_usepercent; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $disk_usepercent; ?>%"></div>
                                                </div>
                                            </div>
                                            <div class="progress-group">
                                                <span class="progress-text">Memory usage</span>
                                                <span class="progress-number"><strong><?php echo byte_format($memory_usage, 2); ?></strong>/<?php echo byte_format($memory_peak_usage, 2); ?></span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="<?php echo $memory_usepercent; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $memory_usepercent; ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </div>
