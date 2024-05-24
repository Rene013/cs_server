
<h1 class="pageTitle"><?= $title ?><br></h1>

<div class="btpage-synd-local btpage-index newsFeed">

	<?php foreach($posts as $post) : ?>	
		<div>
			<dl class="first hasImage" style="min-height: 100px; padding-left: 120px;">
				<dt class="date releaseDate">
					<small class="post-date">
						Posted on: <?php echo $post['created_at']; ?>
						in <strong><?php echo $post['name']; ?></strong>
					</small>
				</dt>
				<dt class="title">
					<a href="<?php // echo $post['url']; ?>"><?php echo $post['title']; ?></a>
				</dt>
				<dd class="image">
					<a title="<?php echo $post['title']; ?>"><img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="" /></a>
				</dd>
				<dd class="summary">
					<p><?php echo word_limiter($post['body'], 60); ?></p>
					<p>&nbsp;</p>
				</dd>
				<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
			</dl>
		</div>	
	<?php endforeach; ?>
	<div>
			<ul class = "pagination">
			<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
