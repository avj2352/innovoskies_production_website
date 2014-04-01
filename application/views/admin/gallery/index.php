<section>
	<h3>Gallery Artworks</h3>
	<?php echo anchor('admin/gallery/edit', '<span class="glyphicon glyphicon-plus"></span> Add an Artwork'); ?>
	<hr>
	<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Date</th>
			<th>File</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php if(count($artworks)): ?>
	<?php foreach($artworks as $art): ?>
		<tr>
			<td><?php echo anchor('admin/gallery/edit/'.$art->id, $art->title); ?></td>
			<td><?php echo $art->pubdate; ?></td>
			<td><?php echo $art->path; ?></td>
			<!-- This calls the cms_helper file from the helper folder -->
			<td><?php echo btn_edit('admin/gallery/edit/'. $art->id); ?></td>
			<td><?php echo btn_delete('admin/gallery/delete/'. $art->id); ?></td>
		</tr>
	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan = "3">We could not find any Artworks.</td>
		</tr>
	<?php endif; ?>
	</tbody>
	</table>
</section>