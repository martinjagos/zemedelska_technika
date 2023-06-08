<?php

namespace App\Controllers;

use App\Models\Komponenty as KModel;
use App\Models\Kategorie as KatModel;
use App\Models\Vyrobce as VyrModel;
use Config\PageConfig;

class Shop extends BaseController
{
    var $kModel;
    var $katModel;
    var $vyrModel;
    function __construct() {

        $this->kModel = new KModel();
        $this->katModel = new KatModel();
        $this->vyrModel = new VyrModel();
    }
    function komponenty(){
        $config = new PageConfig();
        $promenna = $config->pagerDomu;
        $data["seznamKat"] = $this->katModel->orderBy('idKomponent', 'asc')->findAll();
        $data["seznam"] = $this->kModel->orderBy('id', 'asc')->paginate($promenna);
        $data["title"] = "Domů";
        $data["pager"] = $this->kModel->pager;
        return view("main/domu-komponenty", $data);
    }
    function kategorie($kat){
        $config = new PageConfig();
        $promenna = $config->pagerKategorie;
        $ids = $this->katModel->where("url", $kat)->orderBy('idKomponent', 'asc')->findAll()[0]->idKomponent;
        $data["seznamKat"] = $this->katModel->where("url", $kat)->orderBy('idKomponent', 'asc')->findAll();
        $data["seznam"] = $this->kModel->where("typKomponent_id", $ids)->orderBy('id', 'asc')->paginate($promenna);
        $data["title"] = $data["seznamKat"][0] -> typKomponent;
        $data["pager"] = $this->kModel->pager;
        return view("main/kategorie", $data);
    }
    function product($lid){
        $data["seznamKat"] = $this->katModel->orderBy('idKomponent', 'asc')->findAll();
        $data["seznam"] = $this->kModel->find($lid);
        $idVyr = $data["seznam"] -> vyrobce_id;
        $data["seznamVyr"] = $this->vyrModel->find($idVyr);
        $data["title"] = $data["seznam"] -> nazev;
        return view("main/product", $data);
    }
    function newCategory(){
        $data["title"] = "Přidat kategorii";
        echo view('upravaKategorii/addCategory', $data);
    }
    function createCategory(){
        $nazev = $this->request->getPost('nazevKategorie');
        $url = $this->request->getPost('urlKategorie');

        $data = array(
           'typKomponent' => $nazev,
           'url' => $url,
        );

       $this->katModel->save($data);
       return redirect()->route('komponenty/prehledKategorii');
    }
    function editCategory($kat){
        $data["seznamKat"] = $this->katModel->where("url", $kat)->orderBy('idKomponent', 'asc')->findAll();
        $data["title"] = $data["seznamKat"][0] -> typKomponent;
        echo view('upravaKategorii/editCategory', $data);
    }
    function editCategoryMethod(){
        $nazev = $this->request->getPost('nazevKategorie');
        $url = $this->request->getPost('urlKategorie');
        $id = $this->request->getPost('id');

        $data = array(
           'typKomponent' => $nazev,
           'url' => $url,
           'idKomponent' => $id,
        );

       $this->katModel->save($data);
       return redirect()->route('komponenty/prehledKategorii');
    }
    function deleteCategory($kat){
        $data["seznamKat"] = $this->katModel->where("url", $kat)->orderBy('idKomponent', 'asc')->findAll();
        $id = $data["seznamKat"][0]->idKomponent;
        $return = $this->katModel->delete($id);
        return redirect()->route('komponenty/prehledKategorii');
    }
    function prehledKategorii(){
        $data["seznamKat"] = $this->katModel->orderBy('idKomponent', 'asc')->findAll();
        $data["title"] = "Přehled kategorií";
        echo view('upravaKategorii/prehledKategorii', $data);
    }
    function prehledKomponent(){
        $data["seznam"] = $this->kModel->orderBy('id', 'asc')->findAll();
        $data["title"] = "Přehled komponent";
        echo view('upravaKomponent/prehledKomponent', $data);
    }
    function newComponent(){
        $data["title"] = "Přidat komponentu";
        echo view('upravaKomponent/addKomponent', $data);
    }
    function createComponent(){
        $nazev = $this->request->getPost('nazevKomponenty');
        $vyrobce = (int) $this->request->getPost('vyrobceId');
        $typ = (int) $this->request->getPost('typKomponentId');
        $img = $this->request->getFile('pic');
        $link = $this->request->getPost('odkaz');
        
        $name = "img-".$img->getCTime().".".$img->getClientExtension();
        $img->move('assets/komponenty/komponenty/', $name);

        $data = array(
           'nazev' => $nazev,
           'vyrobce_id' => $vyrobce,
           'typKomponent_id' => $typ,
           'pic' => $name,
           'odkaz' => $link,
        );

        var_dump($nazev);
        var_dump($vyrobce);
        var_dump($typ);
        $this->kModel->save($data);
        return redirect()->route('komponenty/prehledKomponent');
    }

}