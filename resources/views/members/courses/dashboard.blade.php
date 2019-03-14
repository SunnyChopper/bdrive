@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				@if(count($course_modules) == 0)
					<h3>No content has been added for this course.</h3>
				@else
					<div class="accordion" id="course_content">
						<?php $i = 0; ?>
						@foreach($course_modules as $module)
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#module_{{ $i }}" area-expanded="false" aria-controls="module_{{ $i }}">
											{{ $i }}. {{ $module->title }}
										</button>
									</h5>
								</div>

								<div id="module_{{ $i }}" class="collapse show" aria-labelledby="heading_{{ $i }}" data-parent="#course_content">
									<div class="card-body">
										<p class="mb-8">{{ $module->description }}</p>

										<?php $module_videos = CourseHelper::getVideosForModule($module->id); ?>
										@if(count($module_videos) > 0)
											<h4>Videos</h4>
											<ul class="list-group">
												@foreach($module_videos as $video)
													<li class="list-group-item">
														<div class="row">
															<div class="col-6">
																<p class="mb-0">{{ $video->title }}</p>
															</div>
															<div class="col-6">
																<a href="/members/courses/{{ $course->id }}/watch/{{ $video->id }}" class="btn btn-primary right-button">Watch Video</a>
															</div>
														</div>
													</li>
												@endforeach
											</ul>
										@endif

										<?php $module_quizzes = CourseHelper::getQuizzesForModule($module->id); ?>
										@if(count($module_quizzes) > 0)
											<h4>Quizzes</h4>
											<ul class="list-group">
												@foreach($module_quizzes as $quiz)
													<li class="list-group-item">
														<div class="row">
															<div class="col-6">
																<p class="mb-0">{{ $quiz->title }}</p>
																<p class="mb-0"><small>{{ CourseHelper::getQuizGrade(Auth::id(), $quiz->id) }}</small></p>
															</div>
															<div class="col-6">
																<a href="/members/courses/{{ $course->id }}/quiz/{{ $quiz->id }}" class="btn btn-primary right-button">Take Quiz</a>
															</div>
														</div>
													</li>
												@endforeach
											</ul>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="gray-box">
					<div class="row">
						<div class="col-6">
							<p class="text-left mb-0">Course Grade:</h5>
						</div>
						<div class="col-6">
							<p class="text-right mb-0"><strong>{{ CourseHelper::getCourseGrade(Auth::id(), $course->id) }}</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection