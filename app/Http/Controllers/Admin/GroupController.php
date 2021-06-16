<?php

namespace App\Http\Controllers\Admin;

use App\Benefits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use App\Groups;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:create group")->only(["create", "store"]);
        $this->middleware("permission:read group")->only(["index"]);
        $this->middleware("permission:update group")->only(["edit", "update"]);
        $this->middleware("permission:delete group")->only(["destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.group.index', [
            'title' => 'Kategori | Techpolitan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create', [
            'title' => 'Tambah Kategori | Techpolitan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'benefit_names' => "required|array|min:1",
            'benefit_amounts' => "required|array|min:1",
            'benefit_names.*' => "required|min:3",
            'benefit_amounts.*' => "required|numeric",
        ]);

        try {
            DB::beginTransaction();

            $group = Groups::create($request->only(
                'name'
            ));

            array_map(function ($n, $a) use ($group) {
                $data = [
                    "name" => $n,
                    "group_id" => $group->id,
                    "amount" => $a,
                ];
                $ben = Benefits::create($data);
                return $ben->id;
            }, $request->benefit_names, $request->benefit_amounts);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('admin.group.index')->with('danger', 'Data Gagal Ditambah');
        }

        return redirect()->route('admin.group.index')->with('success', 'Data Berhasil Ditambah');
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
    public function edit(Groups $group)
    {
        return view('admin.group.edit', [
            'title' => 'Update Kategori | Techpolitan',
            'group' => $group,
            'benefits' => $group->benefit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $group)
    {
        $group->update([
            'name' => $request->name
        ]);

        if (!is_null($request->benefit_names)) {
            $this->validate($request, [
                'benefit_names' => "array|min:1",
                'benefit_amounts' => "array|min:1",
                'benefit_names.*' => "min:3",
                'benefit_amounts.*' => "numeric",
            ]);

            try {
                DB::beginTransaction();

                array_map(function ($n, $a) use ($group) {
                    $data = [
                        "name" => $n,
                        "group_id" => $group->id,
                        "amount" => $a,
                    ];
                    $ben = Benefits::create($data);
                    return $ben->id;
                }, $request->benefit_names, $request->benefit_amounts);
                DB::commit();
            } catch (QueryException $e) {
                DB::rollBack();
                return redirect()->route('admin.group.index')->with('danger', 'Data Gagal Ditambah');
            }
        }

        return redirect()->route('admin.group.index')->with('info', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $group)
    {
        try {
            DB::beginTransaction();
            Benefits::where("group_id", $group->id)->delete();
            $group->delete();
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('admin.group.index')->with('danger', 'Data Gagal Didelete');
        }
        return redirect()->route('admin.group.index')->with('success', 'Data Berhasil Didelete');
    }
}
