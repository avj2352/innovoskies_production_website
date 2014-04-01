<h3><strong><?php echo empty($article->id) ? 'Add a new Article': 'Edit Article: ' . $article->title; ?></strong></h3>
    <!-- <?php //echo '<pre>' . print_r($this->session->articledata, TRUE) . '</pre>'; ?> -->
  	<?php echo validation_errors('<p class="errors">'); ?>
    <?php echo form_open(); ?>
    <!--<?php //var_dump($hashvalue); ?>-->
    <table class="table">
        <tr>
            <td>Publication Date:</td>
            <td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker form-control"'); ?></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><?php echo form_input('title', set_value('title', $article->title), 'class="form-control"'); ?></td>
        </tr>
    	<tr>
    		<td>Slug:</td>
    		<td><?php echo form_input('slug', set_value('slug', $article->slug), 'class="form-control"'); ?></td>
    	</tr>
    	<tr>
    		<td>Body</td>
    		<td><?php echo form_textarea('body', set_value('body', $article->body), 'class="tinymce form-control", rows="4", columns="100"'); ?></td>
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