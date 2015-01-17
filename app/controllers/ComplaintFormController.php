<?php

class ComplaintFormController extends BaseController {

    public function newComplaintView(){
        $this->layout = static::$_layout;
        $view = $this->_defaultView();

        return $view;
    }

    public function complaintFormView($form){
        if(!View::exists("forms/{$form}")){
            Session::flash('flash_error', "Form {$form} not found!");
            return Redirect::to('error');
        }

        $this->layout = static::$_layout;
        $view = $this->_defaultView()->nest('content', "forms/{$form}");

        return $view;
    }

    public function submitAction(){

        $data = array();
        //TODO: Add data integrity validation
        foreach( Input::all() as $key => $val ){
            switch($key) {
            case 'complaint_defendant':
                $data['defendant'] = $val;
                break;
            case 'complaint_desc':
                $data['desc'] = $val;
                break;
            case 'complaint_severity':
                $data['severity'] = intval($val);
                break;
            case 'complaint_investigate':
                $data['investigate'] = ($val == 'Yes') ? true : false;
                break;
            case 'complaint_type':
                $data['type'] = $val;
                break;
            case '_token': // Don't save the token
                break;
            case 'complaint_submitted':
                $data['anonymous'] = ($val == 'user') ?  false : true;
                break;
            default:
                $data['data'][$key] = $val;
                break;
            }
        }

        //Serialize all not needed data
        $data['data'] = serialize( $data['data'] );

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'new';

        $complaint = Complaint::create( $data );

        return Redirect::route('single', array($complaint->id));

    }
}