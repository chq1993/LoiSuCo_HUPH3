<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\User;
use App\Division;
use App\Position;

use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB as DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::all();
        $division = Division::all();
        $position = Position::all();

        $job = DB::table('jobs')
            ->join('user', 'jobs.user_id', '=', 'user.id')
            ->join('positions', 'jobs.position_id', '=', 'positions.id')
            ->join('divisions', 'jobs.division_id', '=', 'divisions.id')
            ->select(
                'jobs.id',
                'jobs.created_at',
                'jobs.updated_at',
                'jobs.percentageOfRole',
                'jobs.start_time',
                'jobs.end_time',
                'divisions.name_division',
                'positions.name_position',
                'user.username',
                'user.fullname'
            )
            ->get();

        return view('jobs.index', [
            'job' => $job,
            'user' => $user,
            'division' => $division,
            'position' => $position
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slbUser = $request->get("slbUser");
        $slbDivision = $request->get("slbDivision");
        $slbPosition = $request->get("slbPosition");
        $txtPercentageOfRole = $request->get("txtPercentageOfRole");
        $dateStartTime = $request->get("dateStartTime");
        $dateEndTime = $request->get("dateEndTime");

        $obj = new Jobs([
            'user_id' => $slbUser,
            'division_id' => $slbDivision,
            'position_id' => $slbPosition,
            'percentageOfRole' => $txtPercentageOfRole,
            'start_time' => $dateStartTime,
            'end_time' => $dateEndTime,
        ]);

        if ($obj->save()) {
            //Hiển thị thông báo check với điều kiện ngoài index
            alert()->success('Cấu hình người dùng', 'Thành công');
            return redirect('/job')->with('success', 'Lưu thông tin vị trí công việc thành công');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
