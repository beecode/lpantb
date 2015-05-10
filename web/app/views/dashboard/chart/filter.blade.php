<div class="col-md-12">
  <div class="box box-info">
    <div class="box-body">
      <form action="<?php echo URL::to('dash/filter') ?>" method="get">
        <div class="row">
          <div class="col-sm-1" style="padding-top:8px; padding-right:0px; margin-right: 0px;">
            <label>Filter Dari</label>
          </div>
          <div class="col-sm-2 form-group has-warning" style="margin-bottom:0px;">
            <?php
              echo Form::select(
                                'start_month',
                                $option['month'],
                                $form['start_month'],
                                array('class'=>'form-control')
                                );
            ?>
          </div>
          <div class="col-sm-2 form-group has-warning" style="margin-bottom:0px;">
            <?php
              echo Form::select(
                                'start_year',
                                $option['start_year'],
                                $form['start_year'],
                                array('class'=>'form-control')
                                );
            ?>
            </div>

            <div class="col-sm-1" style="text-align:center;padding-top:8px;">
              <label>S/D</label>
            </div>

            <div class="col-sm-2 form-group has-warning" style="margin-bottom:0px;">
              <?php
                echo Form::select(
                                  'end_month',
                                  $option['month'],
                                  $form['end_month'],
                                  array('class'=>'form-control')
                                  );
              ?>
            </div>
            <div class="col-sm-2 form-group has-warning" style="margin-bottom:0px;">
              <?php
                echo Form::select(
                                  'end_year',
                                  $option['end_year'],
                                  $form['end_year'],
                                  array('class'=>'form-control')
                                  );
              ?>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-info btn-flat">
                  <span class="fa fa-search"></span>
                  Filter
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
