<?php


class Rejestracja extends Controller
{
    private $users;
    public function __construct(){
        $this->users=$this->model('Registration');

    }
    public function dane () {

        $data = array(
            'email'=>[],
            'login'=>[],
            'password'=>[],
            'id'=>[]
        );


        $this->view('zarejestruj', $data);
    }
    public function zapis()
    {
        if (isset($_POST['email'])) {
            $poprawne = true;

            $login = $_POST['id'];

            if (strlen($login) < 3 || (strlen($login) > 20)) {

                $poprawne = false;
                $_SESSION['e_login'] = "Nick musi posiadac od 3 do 20 znaków!";
            }

            if (ctype_alnum($login) == false) {
                $poprawne = false;
                $_SESSION['e_login'] = "Login może składać się tylko z liter i cyfr (bez polskich znaków)!";
            }

            $email = $_POST['email'];
            $email_bez = filter_var($email, FILTER_SANITIZE_EMAIL);

            if ((filter_var($email_bez, FILTER_VALIDATE_EMAIL) == false) || ($email_bez != $email)) {
                $poprawne = false;
                $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
            }

            $password = $_POST['password'];
            $repeat_password = $_POST['Repeat_Password'];

            if (strlen($password) < 8 || (strlen($password) > 20)) {
                $poprawne = false;
                $_SESSION['e_email'] = "Hasło musi zawieracć od 8 do 20 znaków";
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);

            if ($password != $repeat_password) {
                $poprawne = false;
                $_SESSION['e_haslo'] = "Hasła nie są takie same!";
            }
            $mongodata = $this->users->getall();
            foreach ($mongodata as $jak) {
                $data['login'][$jak->email] = $jak->login;
                $data['password'][$jak->email] = $jak->password;
            }

            foreach($data['login'] as $index=>$image) {
                $user =  $data['login'][$index];

                if($user==$login){

                    $poprawne=false;
                    $_SESSION['e_session']="Taki użytkownik już istnieje!";

                }
            }

            if ($poprawne == true) {


                $this->users->insert([
                    'email' => $email,
                    'login' => $login,
                    'password' => $hash,

                ]);

                $_SESSION['e_poprawne']="Gratulujemy, twoje konto zostało utworzone!";
            }
        }

        header("Location: " . Resources::route("rejestracja/dane"));
         exit;
    }
    public function odpis(){
        $Password = $_POST['Password'];
        $Login = $_POST['Login'];
        $hash = password_hash($Password, PASSWORD_DEFAULT);

        $mongodata = $this->users->getall();
        foreach ($mongodata as $jak) {
            $data['login'][$jak->email] = $jak->login;
            $data['password'][$jak->email] = $jak->password;
        }
        foreach($data['login'] as $index=>$image) {
            $user =  $data['login'][$index];
            $kod =  $data['password'][$index];


            if($user==$Login && password_verify($Password, $kod) ){

                $_SESSION['user_id'] = $data['login'];
                header("Location: ".Resources::route("galeria/lista?page=1"));
                exit;
            }
            else{
                $_SESSION['e_blad']="Niepoprawne hasło lub login. Konto może również nie istnieć!";
            }
        }

        header("Location: ".Resources::route("login/sprawdz"));
        exit;
    }
    public function logout(){
        session_unset();
        header("Location: ".Resources::route("login/sprawdz"));
        exit;
    }
}
