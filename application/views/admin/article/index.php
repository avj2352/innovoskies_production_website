<section>
	<h3>News Articles</h3>
	<?php echo anchor('admin/article/edit', '<span class="glyphicon glyphicon-plus"></span> Add an article'); ?>
	<hr>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Pubdate</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php if(count($articles)): ?>
	<?php foreach($articles as $article): ?>
		<tr>
			<td><?php echo anchor('admin/article/edit/'.$article->id, $article->title); ?></td>
			<td><?php echo $article->pubdate; ?></td>
			<!-- This calls the cms_helper file from the helper folder -->
			<td><?php echo btn_edit('admin/article/edit/'. $article->id); ?></td>
			<td><?php echo btn_delete('admin/article/delete/'. $article->id); ?></td>
		</tr>
	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan = "3">We could not find any articles.</td>
		</tr>
	<?php endif; ?>
	</tbody>
	</table>
</section>