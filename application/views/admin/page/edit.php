<h3><?php echo empty($page->id) ? 'Add a new Page': 'Edit Page: ' . $page->title; ?></h3>
    <!-- <?php //echo '<pre>' . print_r($this->session->pagedata, TRUE) . '</pre>'; ?> -->
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
    <?php echo form_open(); ?>
    <!--<?php //var_dump($hashvalue); ?>-->
    <table class="table">
        <tr>
            <td>Parent:</td>
            <!-- The first  value is the name- parent_id -->
            <!-- The second value should hold an array with all the available options -->
            <!-- The third value is a condition: -->
            <!-- 1. Set value if post variable is there, else 2. Fetch from the DB  -->
    <td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id, 'class="form-control"' ); ?></td>
        </tr>
        <tr>
            <td>Template:</td>
            <!-- The first  value is the name- parent_id -->
            <!-- The second value should hold an array with all the available options -->
            <!-- The third value is a condition: -->
            <!-- 1. Set value if post variable is there, else 2. Fetch from the DB  -->
    <td><?php echo form_dropdown('template', array('homepage' => 'Homepage',
                'page' => 'Landing Page',
                'news_archive' => 'News Archive', 
                'contactus' => 'Contact Us', 
                'gallery' => 'Gallery'), 
                $this->input->post('template') ? $this->input->post('template') : $page->template, 'class="form-control"' ); ?></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><?php echo form_input('title', set_value('title', $page->title), 'class="form-control" columns="60"'); ?></td>
        </tr>
    	<tr>
    		<td>Slug:</td>
    		<td><?php echo form_input('slug', set_value('slug', $page->slug), 'class="form-control" columns="60"'); ?></td>
    	</tr>
    	<tr>
    		<td>Body</td>
    		<td><?php echo form_textarea('body', set_value('body', $page->body), 'class="tinymce form-control", rows="4", columns="100"'); ?></td>
    	</tr>
    	<tr>
    		<td></td>
    		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-info"'); ?></td>
    	</tr>
    </table>
    <?php  echo form_close(); ?>