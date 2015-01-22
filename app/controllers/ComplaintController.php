<?php

class ComplaintController extends BaseController {

    public function singleView($id){

        $complaint = Complaint::find($id);

        if(!$complaint || (!Auth::user()->canReview() && $complaint->user_id != Auth::user()->id)){
            Session::flash('flash_error', "Complaint #{$id} not found");
            return Redirect::to('error');
        }

        //Don't fetch private comments
        if(Auth::user()->canReview()){
            $comments = Message::where('complaint_id', '=', $id)->get();
        } else {
            $comments = Message::where('complaint_id', '=', $id)->where('public', '=', true)->get();
        }

        View::share('comments', $comments);
        View::share('complaint', $complaint);

        $view =  $this->_defaultView()
            ->nest('content', 'complaints/single')
            ->nest('comments_html', 'parts/comments');;

        $closed_status = array('resolved', 'rejected', 'withdraw');

        if(!in_array($complaint->status, $closed_status)){
            $view =$view->nest('comment_form', 'parts/commentform');
        } else {
            if(Auth::user()->canReview()){
                $view =$view->nest('comment_form', 'parts/commentform');
            } else {
                $view =$view->nest('comment_form', 'parts/comments_closed');
            }
        }

        return $view;
    }

    public function updateStautsAction(){

        $complaint = Complaint::find(Input::get('id'));

        if(!$complaint || (!Auth::user()->canReview() && $complaint->user_id != Auth::user()->id)){
            Session::flash('flash_error', "Complaint #" . Input::get('id') . " not found");
            return Redirect::to('error');
        }

        //TODO: Better Error handling
        if(!$complaint->exists) {
            Session::flash('flash_error', "Complaint #" . Input::get('id') . " not found");
            return Redirect::to('error');
        }

        $complaint->status = Input::get('status');
        $complaint->save();

        //Add a comment when the status changed
        $message = ($complaint->anonymous) ? 'Anonymous' : Auth::user()->character_name;
        $message .= ' changed status to "' . BraveComplaintHelper::$status[Input::get('status')] . '" ';
        $message .= 'on ' . date('Y-m-d') . ' at ' .date("H:i");

        Message::create(array(
            'complaint_id' => Input::get('id'),
            'message' => $message,
            'public' => true,
            'user_id' => Auth::user()->id,
            'system_msg' => true
        ));
    }

    public function addCommentAction(){

        Message::create(array(
            'complaint_id' => Input::get('complaint_id'),
            'message' => Input::get('complaint_comment'),
            'public' => (Input::get('complaint_comment_private') == 'yes') ? false : true,
            'user_id' => Auth::user()->id,
        ));

        //Update complaint timestamp for newest activity
        $complaint = Complaint::find(Input::get('complaint_id'));
        $dt = new DateTime('NOW');
        $complaint->updated_at = $dt->format('Y-m-d H:i:s');
        $complaint->save();

        return Redirect::route('single', array('id' => Input::get('complaint_id')));
    }



}