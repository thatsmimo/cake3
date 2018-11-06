<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-center">Site Details</h3>
                    </div>
                    <?= $this->Flash->render() ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php echo $this->Form->create($setting,array('enctype'=>'multipart/form-data')) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <?= $this->Form->input('site_name',['class'=> 'form-control', 'label'=> 'Site Name', ]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->input('meta_data', ['class' => 'form-control', 'label' => 'Meta Data', ]) ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Site Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Favicon</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="favicon" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
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
