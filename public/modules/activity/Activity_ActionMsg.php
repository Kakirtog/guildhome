<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activity_Shout
 *
 * @author Christian Voigt <chris at notjustfor.me>
 */
class Activity_ActionMsg extends Activity {

    function initEnv() {
        Env::registerHook('save_comment_hook', array(new Activity_ActionMsg(), 'saveCommentAction'));
        Env::registerHook('new_user_hook', array(new Activity_ActionMsg(), 'saveNewUserAction'));
        Env::registerHook('actnmsg', array(new Activity_ActionMsg(), 'getActivityView'));
    }
    
    function getActivityById($id = NULL) {
        $db = db::getInstance();
        $sql = "SELECT * FROM activity_actionmsg WHERE activity_id = $id
                    LIMIT 1;";
        $query = $db->query($sql);

        if ($query !== false AND $query->num_rows >= 1) {
            while ($result_row = $query->fetch_object()) {
                $activity = $result_row;
            }
            return $activity;
        }
        return false;
        
    }
    
    function getActivityView($id = NULL) {
        $view = new View();
        $view->setTmpl($view->loadFile('/views/activity/action_msg_view.php'));

        $actionmsg = $this->getActivityById($id);

        $message = $actionmsg->message;
        if (isset($actionmsg->related_activity_id)) {
            $message .= ' <a href="/comment/activity/view/'.$actionmsg->related_activity_id.'">view</a>';
        }
        $view->setContent('{##action_message##}', $message);
        $view->replaceTags();

        return $view;    
    }

    function saveCommentAction($activity_id = NULL) {
        $db = db::getInstance();

        $this->save($type = '4'); // save metadata as action messages are activities
        $actionmsg_id = $db->insert_id;
        
        $activity = parent::getActivityById($activity_id);
        $actionmsg = parent::getActivityById($actionmsg_id);
        $identity = new Identity();
                
        $message = $identity->getIdentityById($actionmsg->userid) . ' commented on ' . $activity->type_description;
                
        $sql = "INSERT INTO activity_actionmsg (activity_id, message, related_activity_id) VALUES ('$actionmsg_id', '$message', '$activity_id');";
        $db->query($sql);        
    }

    function saveNewUserAction($user_id = NULL) {
        $db = db::getInstance();
        $this->save($type = '4'); // save metadata as action messages are activities
        $actionmsg_id = $db->insert_id;
        $identity = new Identity();
        $message = $identity->getIdentityById($user_id, 0) . ' created an account';

        $sql = "INSERT INTO activity_actionmsg (activity_id, message) VALUES ('$actionmsg_id', '$message');";
        $db->query($sql);        
    }
    
}
$activity_actionmsg = new Activity_ActionMsg();
$activity_actionmsg->initEnv();
