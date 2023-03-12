<?php


class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('home', $data);
    }
}