<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-center">Add New Sites</h3>
                        </div>
                        <?= $this->Flash->render() ?>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo $this->Form->create() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <?= $this->Form->input('site_name', ['class' => 'form-control', 'label' => 'Site Name', ]) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('da', ['class' => 'form-control', 'label' => 'Domain Authority', ]) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('trail', ['type'=>'checkbox', 'class' => 'form-control', 'label' => 'Show on Trail', ]) ?>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php echo $this->Form->end() ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
