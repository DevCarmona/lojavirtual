|

    public function index()
    {
        $this->load->library('email');

        $configEmail['protocol'] = 'smtp';

        $this->email->initialize($configEmail);

        $this->email->from('andrecarmonadev@gmail.com', 'Andre Carmona');
        $this->email->reply_to('andrecarmonadev@gmail.com', 'Andre Carmona');
        $this->email->to('andrecarmonadev@gmail.com');
        $this->email->cc('andrecarmonadev@gmail.com');
        $this->email->bcc('andrecarmonadev@gmail.com');//   Copia oculta

        $this->email->subject('Email de teste');
        $this->email->message('Este é o conteudo do email.');
        $this->email->set_alt_message('Esta é a msg alternativa');

        $this->email->attach($_FILES['upload']['tmp_name']);
        $this->email->attach($_FILES['upload']['tmp_name']);
        $this->email->attach($_FILES['upload']['tmp_name']);

        if($this->email->send()) {
            echo 'Email n enviado.';
            $this->email->print_debugger();
        }
        $this->email->clear(); 
    }
}