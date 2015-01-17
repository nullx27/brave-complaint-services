<?php

class ComplaintsController extends BaseController {

    public function overviewView(){
        $view = $this->_defaultView()
            ->nest('content', 'complaints/overview');

        if(Auth::user()->canReview()){
            $complaints = Complaint::orderBy('updated_at', 'desc')->get();
            $view = $view->nest('filter', 'parts/filter');
        } else {
            $complaints = Complaint::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        }

        View::share('complaints', $complaints);

        return $view;
    }

    public function filterOverviewAction(){

        $view = $this->_defaultView()
            ->nest('content', 'complaints/overview');

        if(Auth::user()->canReview()){
            $complaints = Complaint::status(Input::get('filter_status'))
                ->type(Input::get('filter_type'))
                ->name(Input::get('filter_search_name'))
                ->orderBy('updated_at', 'desc');

            $view = $view->nest('filter', 'parts/filter');
        } else {
            $complaints = Complaint::where('user_id', '=', Auth::user()->id);
        }

        $complaints = $complaints->get();

        $selected = array(
            'status' => Input::get('filter_status'),
            'type'  => Input::get('filter_type'),
            'search' => Input::get('filter_search_name'),
        );

        View::share('complaints', $complaints);
        View::share('selected', $selected);

        return $view;
    }
}