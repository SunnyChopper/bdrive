<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DirectQuestion;
use App\Niche;
use App\Course;
use App\CourseModule;
use App\CourseVideo;
use App\MentorTask;
use App\MentorVideo;
use App\MentorDocument;
use App\MentorEnrollment;
use App\MentorRecommendation;
use App\Custom\AdminHelper;
use App\Custom\CourseHelper;
use App\Custom\MentorHelper;
use App\Custom\BlogPostHelper;
use App\Custom\NicheHelper;
use App\Custom\DirectQuestionHelper;

use App\User;

use Auth;
use Hash;
use Session;

class AdminController extends Controller
{
    public function index() {
        // Dynamic page features
    	$page_header = "Admin Login";
    	$page_title = $page_header;

        // Check if needed to redirect
        $redirect_code = $this->redirect_admin();
        if ($redirect_code == 1) {
            $this->login_admin();
            return redirect(url('/admin/dashboard/'));
        } elseif ($redirect_code == 2) {
            return redirect(url('/members/dashboard/'));
        }

    	return view('admin.login')->with('page_header', $page_header)->with('page_title', $page_title);
    }

    public function authenticate_user(Request $data) {
        // Get data
        $username = $data->username;
        $password = $data->password;

        // Get User object
        if (User::where('username', strtolower($username))->count() > 0) {
            $user = User::where('username', strtolower($username))->first();
            $hashed_pwd = Hash::make($password);
            $user_data = array(
                'username' => $username,
                'password' => $password
            ); 
            if (Auth::attempt($user_data)) {
                // Check for backend auth
                if ($user->backend_auth == 0) {
                    return redirect()->back()->with('admin_login_error', 'You are not authorized to access this area.');
                } else {
                    $this->login_admin();
                    return redirect(url('/admin/dashboard'));
                }
            } else {
                return redirect()->back()->with('admin_login_error', 'Password is incorrect.');
            }
        } else {
            return redirect()->back()->with('admin_login_error', 'Username does not exist.');
        }
    }

    public function dashboard() {
        // Dynamic page features
    	$page_header = "Admin Dashboard";
    	$page_title = $page_header;

        // Protect admin backend
        $this->protect();

    	return view('admin.dashboard')->with('page_header', $page_header)->with('page_title', $page_title);
    }

    public function view_blog_posts() {
        // Page data
        $page_header = "Blog Posts";

        // Protect admin backend
        $this->protect();

        // Get blog posts
        $blog_post_helper = new BlogPostHelper();
        $posts = $blog_post_helper->get_all_from_author(Auth::id());

        return view('admin.posts.view')->with('page_header', $page_header)->with('posts', $posts);
    }

    public function new_blog_post() {
        // Page data
        $page_header = "New Blog Post";

        // Protect admin backend
        $this->protect();

        return view('admin.posts.new')->with('page_header', $page_header);
    }

    public function edit_blog_post($post_id) {
        // Page data
        $page_header = "Edit Blog Post";

        // Protect admin backend
        $this->protect();

        // Get post
        $blog_helper = new BlogPostHelper($post_id);
        $post = $blog_helper->read();

        return view('admin.posts.edit')->with('page_header', $page_header)->with('post', $post);
    }

    public function logout() {
        Session::forget('admin_login');
        Session::forget('admin_switch');
        Session::forget('backend_auth');
        Session::save();

        return redirect(url('/'));
    }

    public function view_personal_coaching() {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $mentees = MentorHelper::getAllMentees();

        $page_title = "Your Mentees";
        $page_header = $page_title;

        return view('admin.personal-coaching.view')->with('mentees', $mentees)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_mentee($mentee_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $mentee = User::find(MentorEnrollment::find($mentee_id)->user_id);
        $appointments = MentorHelper::getFutureAppointmentsForUser($mentee->id);
        $documents = MentorHelper::getDocumentsForUser($mentee->id);
        $recommendations = MentorHelper::getRecommendationsForUser($mentee->id);
        $tasks = MentorHelper::getOpenTasksForUser($mentee->id);
        $videos = MentorHelper::getVideosForUser($mentee->id);

        $page_title = $mentee->first_name . " " . $mentee->last_name;
        $page_header = $page_title;

        return view('admin.personal-coaching.dashboard')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee', $mentee)->with('appointments', $appointments)->with('documents', $documents)->with('recommendations', $recommendations)->with('tasks', $tasks)->with('videos', $videos)->with('mentee_id', $mentee_id);
    }

    public function new_mentee_document($mentee_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $mentee = User::find(MentorEnrollment::find($mentee_id)->user_id);

        $page_title = "Share New Document";
        $page_header = $page_title;

        return view('admin.personal-coaching.documents.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee', $mentee)->with('mentee_id', $mentee_id);
    }

    public function create_mentee_document(Request $data) {
        $mentee = MentorEnrollment::find($data->mentee_id);

        $doc = new MentorDocument;
        $doc->user_id = $mentee->user_id;
        $doc->title = $data->title;
        $doc->description = $data->description;
        $doc->link = $data->link;
        $doc->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function edit_mentee_document($mentee_id, $document_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $document = MentorDocument::find($document_id);

        $page_title = "Edit " . $document->title;
        $page_header = $page_title;

        return view('admin.personal-coaching.documents.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id)->with('document', $document);
    }

    public function update_mentee_document(Request $data) {
        $document = MentorDocument::find($data->doc_id);
        $document->title = $data->title;
        $document->description = $data->description;
        $document->link = $data->link;
        $document->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function delete_mentee_document(Request $data) {
        $document = MentorDocument::find($data->doc_id);
        $document->status = 0;
        $document->save();

        return redirect()->back();
    }

    public function new_recommendation($mentee_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "New Recommendation";
        $page_header = $page_title;

        return view('admin.personal-coaching.recommendations.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id);
    }

    public function create_recommendation(Request $data) {
        $mentee = MentorEnrollment::find($data->mentee_id);

        $r = new MentorRecommendation;
        $r->user_id = $mentee->user_id;
        $r->title = $data->title;
        $r->description = $data->description;
        $r->link = $data->link;
        $r->type = $data->type;
        $r->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function edit_recommendation($mentee_id, $r_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $r = MentorRecommendation::find($r_id);

        $page_title = "Edit " . $r->title;
        $page_header = $page_title;

        return view('admin.personal-coaching.recommendations.edit')->with('recommendation', $r)->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id);    
    }

    public function update_recommendation(Request $data) {
        $r = MentorRecommendation::find($data->r_id);
        $r->title = $data->title;
        $r->description = $data->description;
        $r->link = $data->link;
        $r->type = $data->type;
        $r->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function delete_recommendation(Request $data) {
        $r = MentorRecommendation::find($data->r_id);
        $r->is_active = 0;
        $r->save();

        return redirect()->back();
    }

    public function new_task($mentee_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Assign New Task";
        $page_header = $page_title;

        return view('admin.personal-coaching.tasks.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id);
    }

    public function create_task(Request $data) {
        $mentee = MentorEnrollment::find($data->mentee_id);
        $task = new MentorTask;
        $task->user_id = $mentee->user_id;
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));    
    }

    public function edit_task($mentee_id, $task_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $task = MentorTask::find($task_id);

        $page_title = "Edit " . $task->title;
        $page_header = $page_title;

        return view('admin.personal-coaching.tasks.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id)->with('task', $task);
    }

    public function update_task(Request $data) {
        $task = MentorTask::find($data->task_id);
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function delete_task(Request $data) {
        $task = MentorTask::find($data->task_id);
        $task->status = 0;
        $task->save();

        return redirect()->back();
    }

    public function new_video($mentee_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Create New Video";
        $page_header = $page_title;

        return view('admin.personal-coaching.videos.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('mentee_id', $mentee_id);
    }

    public function create_video(Request $data) {
        $mentee = MentorEnrollment::find($data->mentee_id);

        $video = new MentorVideo;
        $video->user_id = $mentee->user_id;
        $video->title = $data->title;
        $video->description = $data->description;
        $video->video_id = $data->video_id;
        $video->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function edit_video($mentee_id, $video_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $video = MentorVideo::find($video_id);

        $page_title = "Edit " . $video->title;
        $page_header = $page_title;

        return view('admin.personal-coaching.videos.edit')->with('video', $video)->with('mentee_id', $mentee_id)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update_video(Request $data) {
        $video = MentorVideo::find($data->vid_id);
        $video->title = $data->title;
        $video->description = $data->description;
        $video->video_id = $data->video_id;
        $video->save();

        return redirect(url('/admin/personal-coaching/mentee/' . $data->mentee_id));
    }

    public function delete_video(Request $data) {
        $video = MentorVideo::find($data->video_id);
        $video->status = 0;
        $video->save();

        return redirect()->back();
    }

    public function view_direct_questions() {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $questions = DirectQuestionHelper::getAllOpen();

        $page_title = "View Open Direct Questions";
        $page_header = $page_title;

        return view('admin.questions.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('questions', $questions);
    }

    public function answer_direct_question($question_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $question = DirectQuestion::find($question_id);

        $page_title = "Answer Direct Question";
        $page_header = $page_title;

        return view('admin.questions.answer')->with('page_title' $page_title)->with('page_header', $page_header)->with('question', $question);
    }

    public function answer_question(Request $data) {
        DirectQuestionHelper::answer($data->question_id, $data->answer);
        return redirect(url('/admin/questions'));
    }

    public function view_niches() {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $niches = NicheHelper::getAllNiches();

        $page_title = "All Niches";
        $page_header = $page_title;

        return view('admin.niches.view')->with('niches', $niches)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function new_niche() {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Create New Niche";
        $page_header = $page_title;

        return view('admin.niches.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit_niche($niche_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $niche = Niche::find($niche_id);

        $page_title = "Editing " . $niche->title;
        $page_header = $page_title;

        return view('admin.niches.edit')->with('niche', $niche)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_niche_questions($niche_id) {
        if (AdminHelper::isAuthorized() == false) {
            return redirect(url('/admin'));
        }

        $niche = Niche::find($niche_id);
        $questions = NicheHelper::getQuestionsForNiche($niche_id);

        $page_title = "Questions for " . $niche->title;
        $page_header = $page_title;

        return view('admin.niches.questions.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('niche', $niche)->with('questions', $questions);
    }

    /* Private functions */
    private function protect() {
        // Check to see if already logged in
        if (Session::has('admin_login')) {
            if (Session::get('admin_login') == false) {
                return redirect(url('/admin'));
            }
        } else {
            return redirect(url('/admin'));
        }
    }

    private function login_admin() {
        $user = Auth::user();
        $backend_auth = $user->backend_auth;

        Session::put('admin_login', true);
        Session::put('admin_switch', false);
        Session::put('backend_auth', $backend_auth);
        Session::save();
    }


    private function redirect_admin() {
        if (Auth::guest()) {
            return 0;
        } else {
            if (Auth::user()->backend_auth == 0) {
                return 2;
            } else {
                return 1;
            }
        }
    }
}
