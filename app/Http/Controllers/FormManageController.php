<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Form;

class FormManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $forms = DB::table('forms');

        if(isset($_GET['search-form'])){
            $forms = $forms->where("name_form", "like", "%" . $_GET["search-form"] . "%");
        }

        $forms = $forms->paginate(5)->appends(request()->query());
        return view('form-manage.index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Hiển thị thông báo check với điều kiện ngoài index
        alert()->success('Mẫu phiếu được thêm mới', 'Thành công');

        $request->validate([
            'name_form' => 'required|max:255',
            'description_form' => 'required|max:255'
        ]);

        $form = new Form([
            'name_form' => $request->get('name_form'),
            'description_form' => $request->get('description_form')
        ]);
        $form->save();
        return redirect('form-manage')->with('create-success', 'Phiếu tạo thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id);
        return view('form-manage.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Hiển thị thông báo check với điều kiện ngoài index
        alert()->success('Mẫu phiếu được cập nhật', 'Thành công');

        $request->validate([
            'name_form' => 'required|max:255',
            'description_form' => 'required|max:255'
        ]);
        $form = Form::find($id);
        $form->name_form = $request->get('name_form');
        $form->description_form = $request->get('description_form');
        $form->save();

        return redirect('form-manage')->with('update-success', 'Cập nhật mẫu phiếu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hiển thị thông báo check với điều kiện ngoài index
        alert()->success('Mẫu phiếu được xóa', 'Thành công');

        $form = Form::find($id);
        $form->delete();
        return redirect('form-manage')->with('delete-success', 'Xóa mẫu phiếu thành công !');
    }
}