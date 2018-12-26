<div class="modal fade" id="free_course_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form id="newsletter_form" action="/lp/submit" method="post">
			{{ csrf_field() }}
			<input type="hidden" value="1" name="lead_magnet_id">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Course under construction</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<p>This course is still being developed! You're early to the party.</p>
							<p>No worries. In the meantime, we can get the same information delivered to you in another way: e-mail.</p>
							<p>Our pre-release newsletter will include bonus material which won't be found in the free course. For access, sign up below. You will also get a notification when this course is ready to go.</p>
							<div class="form-group">
								<label>Name:</label>
								<input type="text" name="name" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" value="Get My Bonuses">
				</div>
			</div>
		</form>
	</div>
</div>