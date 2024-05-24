<div class="btpage-synd-local btpage-feed btpage-index newsFeed" id="sysLatestNews">

<div>
	<dl class="first hasImage" style="min-height: 100px; padding-left: 110px; padding-bottom:10px">
		<dd class="image">
			<a title="<?php echo $post['title']; ?>" href="http://www.trialphaenergy.com/company"><img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="TRI ALPHA Energy is developing Nuclear fusion technology, a clean source of energy"></a>
		</dd>
			<dt class="date releaseDate"><?php echo $post['created_at']; ?></dt>
			<dt class="title">
				<a href="https://www.sciencenews.org/article/nuclear-fusion-gets-boost-private-sector-startups">Nuclear fusion gets boost from private-sector startups</a>
			</dt>
		<dd class="bt_pagenewssummary">
		<p><?php echo $post['body']; ?></p>
		</dd>
	</dl>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
	<dl>
		<dd>
			<dt><a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a></dt>
			<dt>
				<?php echo form_open('/posts/delete/'.$post['id']); ?>
				<input type="submit" value="Delete" class="btn btn-danger">
				</form>
			</dt>
		</dd>
	</dl>
<?php endif; ?>
</div>
<?php if($this->session->userdata('logged_in')){ ?>
	<div class = "container">
		<div class="row">
			<div class ="col-md-8 offset-md-4">
				<h5>Comments</h5>
				<?php if($comments) : ?>
					<?php foreach($comments as $comment) : ?>
						<div>
							<p><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</p>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Comments yet</p>
				<?php endif; ?>

				<h5>Add Comment</h5>
				<div class="pubs" style="margin-left:10px;"
				<?php echo validation_errors(); ?>
				<?php echo form_open('comments/create/'.$post['id']); ?>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Body</label>
						<textarea name="body" class="form-control"></textarea>
					</div>
					<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
				</div>
			</div>
		</div>
	</div>
<?php }?>
</div>
