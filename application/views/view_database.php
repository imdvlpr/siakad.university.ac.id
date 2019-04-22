<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Database</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
        <div class="input-group-prepend">

        </div>
        <span id="date_time"></span>
<script type="text/javascript">window.onload = date_time('date_time');</script>
      </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col">
  <h4>Platform : <?php echo $platform; ?></h4>
  <h4>Version  : <?php echo $version; ?></h4>
  <h4>List Of Tables</h4>
  <br>
  <table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>name</th>
            <th>type</th>
            <th>max_length</th>
            <th>primary_key</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_tables as $db):?>
        <tr class="info">
            <th><?php echo $db; ?></th>
            <th colspan="5">&nbsp;</th>
        </tr>
          <?php foreach ($this->db->field_data($db) as $field):?>
            <tr>
              <td>&nbsp;</td>
              <td><?php echo $field->name; ?></td>
              <td><?php echo $field->type; ?></td>
              <td><?php echo $field->max_length; ?></td>
              <td><?php echo $field->primary_key; ?></td>
            </tr>
          <?php endforeach;?>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <th>&nbsp;</th>
            <th>name</th>
            <th>type</th>
            <th>max_length</th>
            <th>primary_key</th>
        </tr>
    </tfoot>
  </table>
</div>
