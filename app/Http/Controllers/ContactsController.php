<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contact;

use DB;

class ContactsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('contacts.index', []);
  }

  public function create(Request $request)
  {
    return view('contacts.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $contact = Contact::findOrFail($id);
    return view('contacts.add', [
      'model' => $contact    ]);
  }

  public function show(Request $request, $id)
  {
    $contact = Contact::findOrFail($id);
    return view('contacts.show', [
      'model' => $contact    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM contacts a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE last_name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('first_name','last_name','phone','email','address',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $contact = null;
  if($request->id > 0) { $contact = Contact::findOrFail($request->id); }
  else {
    $contact = new Contact;
  }


  
      $contact->first_name = $request->first_name;
  
  
      $contact->last_name = $request->last_name;
  
  
      $contact->phone = $request->phone;
  
  
      $contact->email = $request->email;
  
  
      $contact->address = $request->address;
  
    //$contact->user_id = $request->user()->id;
  $contact->save();

  return redirect('/contacts');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $contact = Contact::findOrFail($id);

  $contact->delete();
  return "OK";

}


}
