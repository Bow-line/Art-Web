<?php


class Galeria extends Controller
{
    private $gallerymodel;
    public function __construct(){
        $this->gallerymodel=$this->model('Gallery');
    }
    public function lista ($page=1){
        $elementyNaStronie=4;
        $data=array(
            'min' => [],
            'watermark' => [],
            'paging' => [],
            'autor'=>[],
            'tytul'=>[],
            'error'=>$_SESSION['tmp'] ?: [],
        );
        Session::flushTemp();
        $handle = opendir(UPLOAD.'min/');
        while($file=readdir($handle)){
            if($file!='.'&&$file!='..'&&$file!='watermark/'){
                $data['min'][$file] = '/images/min/'.$file;

            }
        }
        $handle = opendir(UPLOAD.'watermark/');
        while($file=readdir($handle)){
            if($file!='.'&&$file!='..'&&$file!='min/') {
                $data['watermark'][$file]='/images/watermark/'.$file;
            }
        }
        $ilezdjec=count($data['min']);
        $data['paging']=[
            'elementyNaStronie'=>$elementyNaStronie,
            'aktywnaStrona'=>$page,
            'iloscZdjec'=>$ilezdjec,
            'ileStron'=>ceil($ilezdjec/$elementyNaStronie),
        ];



        $mongodata = $this->gallerymodel->getall();
        foreach ($mongodata as $jak) {
            $data['autor'][$jak->fileName] = $jak->autor;
            $data['tytul'][$jak->fileName] = $jak->tytul;
        }
        $data['paging']['aktywnaStrona'] = $_REQUEST['page'];


        $this->view('gallery', $data);

    }
    public function wyslij(){

        if(isset($_POST) && isset($_FILES['file'])) {
            $tytul = $_POST['tytul'];
            $autor = $_POST['autor'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $newfileName = time() . $fileName;
            $znakwodny = $_POST['znak'];
            if (!in_array($fileExt, ['png', 'jpg'])) {

                Session::addTemp('zlerozsz', "Złe rozszerzenie!");
            }
            if (($fileSize / 1024 / 1024) > 1) {

                Session::addTemp('zaduze', "Za duży plik!");
            }

            if (empty($_SESSION['tmp'])) {
                move_uploaded_file($fileTmpName, UPLOAD . $newfileName);
                $save_file = UPLOAD . 'min/' . $newfileName;
                $save_watermark = UPLOAD . 'watermark/' . $newfileName;

                switch ($fileExt) {

                    case 'png':

                        $image = imagecreatefrompng(UPLOAD . $newfileName);
                        imagealphablending($image, true);
                        imagesavealpha($image, true);
                        $blackcolor = imagecolorallocatealpha($image, 50, 110, 5, 10);
                        //$bg = imagecolorallocate($image, 255, 255, 255);
                        imagestring($image, 5, 15, 30, $znakwodny, $blackcolor);

                        imagejpeg($image, $save_watermark, 80);

                        $img = imagecreatefrompng(UPLOAD . $newfileName);
                        $width = imagesx($img);
                        $height = imagesy($img);

                        $width_mini = 200; // szerokosc obrazka
                        $height_mini = 125; // wysokosc obrazka
                        $img_mini = imagecreatetruecolor($width_mini, $height_mini);
                        imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini, $height_mini, $width, $height);
                        imagejpeg($img_mini, $save_file, 80);
                        break;
                    case 'jpg':

                        $image = imagecreatefromjpeg(UPLOAD . $newfileName);
                        $blackcolor = imagecolorallocate($image, 50, 110, 5);
                        imagestring($image, 5, 15, 30, $znakwodny, $blackcolor);

                        imagejpeg($image, $save_watermark, 80);


                        $img = imagecreatefromjpeg(UPLOAD . $newfileName);
                        $width = imagesx($img);
                        $height = imagesy($img);

                        $width_mini = 200; // szerokosc obrazka
                        $height_mini = 125; // wysokosc obrazka
                        $img_mini = imagecreatetruecolor($width_mini, $height_mini);
                        imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini, $height_mini, $width, $height);
                        imagejpeg($img_mini, $save_file, 80);
                        break;
                }


                $this->gallerymodel->insert([
                    'autor' => $autor,
                    'tytul' => $tytul,
                    'fileName' => $newfileName,
                ]);
            }

        }
        header("Location: ".Resources::route("galeria/lista?page=1"));
    }
}