<?php

class ContactController extends Controller {

    public function index() {
        echo Template::instance()->render('contact.html');
    }

    public function save(){
        $name = $this->f3->get('POST.name');
        $email = $this->f3->get('POST.email');
        $comments = $this->f3->get('POST.comments');

        $v = new Valitron\Validator(array('Name' => $name,'Email'=>$email,'Comments'=>$comments));
        $v->rule('required', ['Name','Email','Comments']);
        $v->rule('email',[Email]);

        if ($v->validate()) {
            $contact = new Contact($this->db);
            $data = array(
                'name' => $name,
                'email' => $email,
                'comments' => $comments,
                'contact_date' => date('Y-m-d H:i:s')
            );
            $contact->insert($data);
            $response = array(
                'status' => true,
                'message' => 'Your message saved!'
            );
        }else{
            $response = array(
                'status' => false,
                'errors' => $v->errors()
            );
        }
        echo json_encode($response);
    }

}
