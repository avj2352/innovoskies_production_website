<h3><?php echo empty($artwork->id) ? 'Add a new Artwork': 'Edit Artwork: ' . $artwork->title; ?></h3>
    <!-- <?php //echo '<pre>' . print_r($this->session->pagedata, TRUE) . '</pre>'; ?> -->
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
    <?php if (isset($wrong_file)): ?>
        <p class="alert alert-dismissable alert-warning"><?php echo $wrong_file; ?></p>
    <?php endif; ?>
    <?php echo form_open_multipart(); ?>
    <!--<?php //var_dump($hashvalue); ?>-->
    <table class="table">
        <tr>
            <td>Publication Date:</td>
            <td><?php echo form_input('pubdate', set_value('pubdate', $artwork->pubdate), 'class="datepicker form-control"'); ?></td>
        </tr>
        <tr>
            <!-- The first  value is the name- parent_id -->
            <!-- The second value should hold an array with all the available options -->
            <!-- The third value is a condition: -->
            <!-- 1. Set value if post variable is there, else 2. Fetch from the DB  -->
            <td>Name:</td>
            <td><?php echo form_input('title', set_value('title', $artwork->title), 'class="form-control" columns="60"'); ?></td>
        </tr>
    	   <tr><td colspan="2">
            <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-folder-open"></span></span>
            <input type="file" name="path" value="<?php count($artwork->path) ? $artwork->path : '';?>" class="form-control">
                              </div>
            </td>
            </tr>
            <tr>
            <td>Category:</td>
            <!-- The first  value is the name- parent_id -->
            <!-- The second value should hold an array with all the available options -->
            <!-- The third value is a condition: -->
            <!-- 1. Set value if post variable is there, else 2. Fetch from the DB  -->
            <td><?php echo form_dropdown('category', array('works' => '2D/3D Works', 
                'concepts' => 'Creative Concepts', 
                'brochures' => 'Brochures', 
                'websites' => 'Websites', 
                'logos' => 'Logo Designs'), 
                $this->input->post('category') ? $this->input->post('category') : $artwork->category, 
                'class="form-control"' ); ?></td>
        </tr>
    	<tr>
    		<td>Description</td>
    		<td><?php echo form_textarea('description', set_value('description', $artwork->description), 'class="tinymce form-control", rows="4", columns="100"'); ?></td>
    	</tr>
    	<tr>
    		<td></td>
    		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-info"'); ?></td>
    	</tr>
    </table>
    <?php  echo form_close(); ?>
<script>
    $(function(){
            $('.datepicker').datepicker({ format: 'yyyy-mm-dd'});
            $(".datepicker").mouseover(function() {
            $(this).css('cursor', 'pointer');
            });
        });

</script>        