<?php echo Form::open(array('route' => array('filterOverview')))?>

<div class="filter-grid">
    <div class="row">
        <div class="col-md-2">
            <h5>&nbsp;</h5>
            <h4>Filter:</h4>
        </div>

        <div class="col-md-2">
            <h5>Status</h5>
            <select class="form-control" name="filter_status">
                <option value="all" <?php if(isset($selected['status']) && $selected['status'] == 'all') echo "selected"; ?> >All</option>

                <?php foreach(BraveComplaintHelper::$status as $key => $val): ?>
                    <option value="<?php echo $key;?>" <?php if(isset($selected['status']) && $selected['status'] == $key) echo "selected"; ?>><?php echo $val;?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-md-2">
            <h5>Type</h5>
            <select class="form-control" name="filter_type">
                <option value="all" <?php if(isset($selected['status']) && $selected['status'] == 'all') echo "selected"; ?>>All</option>

                <?php foreach(BraveComplaintHelper::$types as $key => $val): ?>
                    <option value="<?php echo $key;?>" <?php if(isset($selected['type']) && $selected['type'] == $key) echo "selected"; ?>><?php echo $val;?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <h5>Search</h5>
            <div class="input-group">
                <input type="text" class="form-control" name="filter_search_name" placeholder="" <?php if(isset($selected['search'])) echo "value=\"{$selected['search']}\""; ?>>
                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                    </span>
            </div>
        </div>

        <div class="col-md-2">
            <h5>&nbsp;</h5>
            <input type="submit" class="btn btn-primary" value="Filter" style="width:100%" />
        </div>

    </div>
</div>
</form>