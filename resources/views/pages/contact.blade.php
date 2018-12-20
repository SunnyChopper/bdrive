@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64 mt-32-mobile mb-32-mobile">
		<div class="row justify-content-center">
			<div class="col-lg-6 order-lg-2 col-md-6 order-md-2 col-sm-12 order-sm-1 col-12 order-1 mb-32-mobile">
				<h3>Connect</h3>
				<hr />
				<a href=""><p><span class="icon-facebook-square" style="top: 2px; position: relative;"></span> Facebook</p></a>
				<a href=""><p><span class="icon-twitter-square" style="top: 2px; position: relative;"></span> Twitter</p></a>
				<a href=""><p><span class="icon-instagram" style="top: 2px; position: relative;"></span> Instagram</p></a>
				<hr />
				<h5>I found a technical bug...</h5>
				<p>Don't contact us! Let's make this easy for both and us. Submit a technical support ticket and our developers will get on it.</p>
				<a href="/support/ticket/new" class="btn btn-primary">Create Support Ticket</a>
			</div>
			<div class="col-lg-6 order-lg-1 col-md-6 order-md-1 col-sm-12 order-sm-2 col-12 order-2">
				<div class="gray-box">
					<form>
						<div class="row form-group">
							<div class="col-12">
								<label>Name:</label>
								<input type="text" class="form-control" name="name" autofocus required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12">
								<label>Category:</label>
								<select class="form-control" name="category">
									<option value="Billing">Billing</option>
									<option value="Abuse Report">Abuse Report</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12">
								<label>Message:</label>
								<textarea name="message" class="form-control" form="contact_form" rows="5"></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12">
								<input type="submit" value="Submit" class="btn btn-success center-button">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection